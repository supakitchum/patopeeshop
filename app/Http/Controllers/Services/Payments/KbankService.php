<?php

namespace App\Http\Controllers\Services\Payments;

use App\Model\KbankApiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KbankService extends Controller
{
    public function BillLookupError($responseCode, $responseDescription, $request)
    {
        return response()->json([
            "functionName" => "BillLookupResponse",
            "transactionId" => $request->transactionId ?? "",
            "transactionDateTime" => Carbon::now(),
            "billerTransactionId" => $request->transactionId ?? "",
            "responseCode" => $responseCode,
            "responseDescription" => $responseDescription,
            "billerType" => $request->billerType ?? "",
            "billerId" => $request->billerId ?? "",
            "terminalNo" => $request->terminalNo ?? "",
            "promptPayTransactionId" => "",
            "typeofReceiver" => "",
            "reference1" => $request->reference1 ?? "",
            "reference2" => $request->reference2 ?? "",
            "reference3" => "",
            "info1" => "",
            "info2" => "",
            "info3" => "",
            "additional" => [
                "rsAppId" => "",
                "toBillerAccountName" => "",
                "toBillerServiceName" => "",
                "payerFee" => "",
                "settlementDate" => "",
                "receiverTaxID" => "",
                "dueDate" => "",
                "rtpReference" => ""
            ]
        ]);
    }

    public function BillLookup(Request $request)
    {
        if (!isset($request->reference1)) {
            return $this->BillLookupError("0001", "Invalid Payment reference number", $request);
        }

        if ($request->reference1) {
            $check_paid = KbankApiLog::where('transactionId', '=', $request->transactionId)
                ->where('reference1', '=', $request->reference1)
                ->where('reference2', '=', $request->reference2)
                ->get();

            if (!isset($request->reference2)) {
                return response()->json([
                    "functionName" => "BillLookupResponse",
                    "transactionId" => $request->transactionId ?? "",
                    "transactionDateTime" => Carbon::now(),
                    "billerTransactionId" => $request->transactionId ?? "",
                    "responseCode" => "0000",
                    "responseDescription" => "Success",
                    "billerType" => $request->billerType ?? "",
                    "billerId" => $request->billerId ?? "",
                    "terminalNo" => $request->terminalNo ?? "",
                    "promptPayTransactionId" => "",
                    "typeofReceiver" => "",
                    "reference1" => $request->reference1 ?? "",
                    "reference2" => "999990045751",
                    "reference3" => "",
                    "tranAmount" => "120.00",
                    "info1" => "",
                    "info2" => "",
                    "info3" => "",
                    "additional" => [
                        "rsAppId" => "",
                        "toBillerAccountName" => "",
                        "toBillerServiceName" => "",
                        "payerFee" => "",
                        "settlementDate" => "",
                        "receiverTaxID" => "",
                        "dueDate" => "",
                        "rtpReference" => ""
                    ]
                ]);
            }
        }

        if (!ctype_digit($request->reference1) || !ctype_digit($request->reference2)) {
            return $this->BillLookupError("0001", "Invalid Payment reference number", $request);
        }

        if (!preg_match('/^\d+(\.\d{1,2})?$/', $request->tranAmount) || $request->tranAmount != "120.00") {
            return $this->BillLookupError("0004", "Invalid payment amount", $request);
        }

        if ($request->transactionId === "98099310720200530183382105") {
            return $this->BillLookupError("1000", "Other Merchant Error", $request);
        }

        if (isset($check_paid) && sizeof($check_paid) > 0) {
            if ($check_paid[0]->status) {
                $response = [
                    "functionName" => "BillLookupResponse",
                    "transactionId" => $request->transactionId ?? "",
                    "transactionDateTime" => Carbon::now(),
                    "billerTransactionId" => $request->transactionId ?? "",
                    "responseCode" => "0002",
                    "responseDescription" => "Already paid",
                    "billerType" => $request->billerType ?? "",
                    "billerId" => $request->billerId ?? "",
                    "terminalNo" => $request->terminalNo ?? "",
                    "promptPayTransactionId" => "",
                    "typeofReceiver" => "",
                    "reference1" => $request->reference1 ?? "",
                    "reference2" => $request->reference2 ?? "",
                    "reference3" => "",
                    "info1" => "",
                    "info2" => "",
                    "info3" => "",
                    "additional" => [
                        "rsAppId" => "",
                        "toBillerAccountName" => "",
                        "toBillerServiceName" => "",
                        "payerFee" => "",
                        "settlementDate" => "",
                        "receiverTaxID" => "",
                        "dueDate" => "",
                        "rtpReference" => ""
                    ]
                ];
                return response()->json($response);
            } else {
                $response = [
                    "functionName" => "BillLookupResponse",
                    "transactionId" => $request->transactionId ?? "",
                    "transactionDateTime" => Carbon::now(),
                    "billerTransactionId" => $request->transactionId ?? "",
                    "responseCode" => "0000",
                    "responseDescription" => "Success",
                    "billerType" => $request->billerType ?? "",
                    "billerId" => $request->billerId ?? "",
                    "terminalNo" => $request->terminalNo ?? "",
                    "promptPayTransactionId" => "",
                    "typeofReceiver" => "",
                    "reference1" => $request->reference1 ?? "",
                    "reference2" => $request->reference2 ?? "",
                    "reference3" => "",
                    "info1" => "",
                    "info2" => "",
                    "info3" => "",
                    "additional" => [
                        "rsAppId" => "",
                        "toBillerAccountName" => "",
                        "toBillerServiceName" => "",
                        "payerFee" => "",
                        "settlementDate" => "",
                        "receiverTaxID" => "",
                        "dueDate" => "",
                        "rtpReference" => ""
                    ]
                ];
            }
        } else {
            $new_bill = KbankApiLog::create([
                'transactionId' => $request->transactionId,
                'channelCode' => $request->channelCode,
                'tranAmount' => $request->tranAmount,
                'reference1' => $request->reference1,
                'reference2' => $request->reference2,
                'status' => false
            ]);
            if ($new_bill) {
                if ($request->language === "EN") {
                    $response = [
                        "functionName" => "BillLookupResponse",
                        "transactionId" => $request->transactionId ?? "",
                        "transactionDateTime" => Carbon::now(),
                        "billerTransactionId" => $request->transactionId ?? "",
                        "responseCode" => "0000",
                        "responseDescription" => "Success",
                        "billerType" => $request->billerType ?? "",
                        "billerId" => $request->billerId ?? "",
                        "terminalNo" => $request->terminalNo ?? "",
                        "promptPayTransactionId" => "",
                        "typeofReceiver" => "",
                        "reference1" => $request->reference1 ?? "",
                        "reference2" => $request->reference2 ?? "",
                        "reference3" => "",
                        "info1" => "Customer Name EN",
                        "info2" => "Product Information EN",
                        "info3" => "Other Information EN",
                        "additional" => [
                            "rsAppId" => "",
                            "toBillerAccountName" => "",
                            "toBillerServiceName" => "",
                            "payerFee" => "",
                            "settlementDate" => "",
                            "receiverTaxID" => "",
                            "dueDate" => "",
                            "rtpReference" => ""
                        ]
                    ];
                } else {
                    $response = [
                        "functionName" => "BillLookupResponse",
                        "transactionId" => $request->transactionId ?? "",
                        "transactionDateTime" => Carbon::now(),
                        "billerTransactionId" => $request->transactionId ?? "",
                        "responseCode" => "0000",
                        "responseDescription" => "Success",
                        "billerType" => $request->billerType ?? "",
                        "billerId" => $request->billerId ?? "",
                        "terminalNo" => $request->terminalNo ?? "",
                        "promptPayTransactionId" => "",
                        "typeofReceiver" => "",
                        "reference1" => $request->reference1 ?? "",
                        "reference2" => $request->reference2 ?? "",
                        "reference3" => "",
                        "info1" => "ชื่อลูกค้า",
                        "info2" => "ชื่อสินค้า",
                        "info3" => "อื่นๆ",
                        "additional" => [
                            "rsAppId" => "",
                            "toBillerAccountName" => "",
                            "toBillerServiceName" => "",
                            "payerFee" => "",
                            "settlementDate" => "",
                            "receiverTaxID" => "",
                            "dueDate" => "",
                            "rtpReference" => ""
                        ]
                    ];
                }
            } else {
                return $this->BillLookupError("0001", "Invalid Payment reference number", $request);
            }
        }

        return response()->json($response);
    }

    public function BillPayment(Request $request)
    {
        if (isset($request->isRetry) && (int)$request->isRetry === 1) {
            $response = [
                "functionName" => "BillPaymentResponse",
                "transactionId" => $request->transactionId ?? "",
                "responseDateTime" => Carbon::now(),
                "billerTransactionId" => $request->transactionId ?? "",
                "responseCode" => "0000",
                "responseDescription" => "Success",
                "terminalNo" => $request->terminalNo ?? "",
                "additional" => [
                    "settlementDate" => "",
                    "rsAppId" => ""
                ]
            ];
        } else {
            KbankApiLog::where('transactionId', '=', $request->transactionId)->update([
                "status" => true
            ]);

            $response = [
                "functionName" => "BillPaymentResponse",
                "transactionId" => $request->transactionId ?? "",
                "responseDateTime" => Carbon::now(),
                "billerTransactionId" => $request->transactionId ?? "",
                "responseCode" => "0000",
                "responseDescription" => "Success",
                "terminalNo" => $request->terminalNo ?? "",
                "additional" => [
                    "settlementDate" => "",
                    "rsAppId" => ""
                ]
            ];
        }

        return response()->json($response);
    }

}
