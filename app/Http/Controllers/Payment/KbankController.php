<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Services\Payments\KbankService;
use App\KbankTransaction;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KbankController extends Controller
{
    public function createQR(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => ["required", 'regex:/^\d+(\.\d{1,2})?$/'],
            'reference1' => 'string|max:20|nullable',
            'reference2' => 'string|max:20|nullable',
            'reference3' => 'string|max:20|nullable',
            'reference4' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $tnx = KbankTransaction::latest('id')->value('id');
        $service = new KbankService();

//        $res = [
//            "partnerTxnUid" => "PROPCHOCK1",
//            "partnerId" => "CRP0000351",
//            "statusCode" => "00",
//            "errorCode" => "",
//            "errorDesc" => "",
//            "accountName" => "บจก. เค.เอส.อินเตอร์เนชั่นแนล เมเนจเม้นท์",
//            "qrCode" => "00020101021230810016A00000067701011201150107536000315010214KB0000020354510320API1728373997142181931690016A00000067701011301030040214KB0000020354510420API1728373997142181953037645406100.005802TH63049029",
//            "sof" => [
//                "PP"
//            ]
//        ];
        try {
            $res = $service->createThaiQr($request->partner->name . ($tnx + 1), $request->amount, $request->reference1 ?? '', $request->reference2 ?? '', $request->reference3 ?? '', $request->reference4 ?? '');
            if (isset($res["statusCode"]) && $res["statusCode"] === "00") {
                $qr = base64_encode(QrCode::format('png')->size(512)->generate($res["qrCode"]));
                $new_tnx = KbankTransaction::updateOrCreate([
                    "txn_id" => $res["partnerTxnUid"]
                ], [
                    "txn_id" => $res["partnerTxnUid"],
                    "amount" => $request->amount,
                    "partner_id" => $request->partner->id,
                    "response" => $res,
                    "status" => "PENDING"
                ]);

                return response()->json([
                    "code" => 0,
                    "result" => [
                        "txn" => $new_tnx,
                        "qr" => $qr
                    ]
                ]);
            } else {
                return response()->json([
                    "code" => 1000,
                    "result" => $res
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                "code" => 1000,
                "message" => "เกิด Error ไม่ทราบสาเหตุ"
            ], 400);
        }


    }

    public function cancelBill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txn_id' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $check = KbankTransaction::where('txn_id', '=', $request->txn_id)
            ->where('partner_id', '=', $request->partner->id)
            ->first();
        if ($check) {
            $service = new KbankService();
            $cancel = $service->cancellBill($check->txn_id, $check->created_at);
            $check->status = "CANCEL";
            $check->save();

            return response()->json([
                "code" => 0,
                "result" => $cancel
            ]);
        }

        return response()->json([
            "code" => 0,
            "message" => "Txn ID invalid"
        ], 400);

    }

    public function getDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txn_id' => 'string|max:20|required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = KbankTransaction::where('txn_id', '=', $request->txn_id)->first();
        if ($data) {
            return response()->json([
                "code" => 0,
                "result" => $data
            ]);
        }

        return response()->json([
            "code" => 1000,
            "message" => "Tnx ID not found."
        ], 404);
    }

    public function callBack(Request $request)
    {
        $transaction = KbankTransaction::where('txn_id', '=', $request->partnerTxnUid)->first();
        if ($transaction) {
            $data = $request->all();
            $old = KbankTransaction::where('txn_id', '=', $request->partnerTxnUid)->first();
            $old->callback_data = $data;
            $old->status = "PAID";
            $old->save();

            $partner = Partner::find($transaction->partner_id);

            $data = json_encode($request->all());

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $partner->callback_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                return 'Curl error: ' . curl_error($ch);
            } else {
                curl_close($ch);
                return response()->json([
                    "statusCode" => "00",
                    "errorCode" => null,
                    "errorDesc" => null,
                    "result" => json_decode($response,true)
                ]);
            }
//            Http::connectTimeout(2)->withBody($request->all(), 'application/json')
//                ->post($partner->callback_url);
        }

        return response()->json([
            "statusCode" => "00",
            "errorCode" => null,
            "errorDesc" => null
        ]);
    }
}
