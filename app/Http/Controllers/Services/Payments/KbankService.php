<?php

namespace App\Http\Controllers\Services\Payments;

use App\KbankTransaction;
use App\Model\KbankApiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KbankService extends Controller
{
    public $base_api = "https://openapi.kasikornbank.com";
    public $consumer_id;
    public $consumer_secret;
    public $partner_id;
    public $partner_secret;
    public $merchant_id;
    public $access_token;

    public function __construct()
    {
        $this->consumer_id = env('KBANK_CONSUMER_ID');
        $this->consumer_secret = env('KBANK_CONSUMER_SECRET');
        $this->partner_id = env('KBANK_PARTNER_ID');
        $this->partner_secret = env("KBANK_PARTNER_SECRET");
        $this->merchant_id = env("KBANK_MERCHANT_ID");

        //  check expire token
        if (Storage::disk('public')->exists('auth.json')) {
            $old_token = Storage::disk('public')->get('auth.json');
            $old_token = json_decode($old_token, true);
            if (isset($old_token["created_at"])) {
                $created_at = Carbon::parse($old_token["created_at"]);
                if (abs($created_at->diffInMinutes(Carbon::now())) <= 28) {
                    $this->access_token = $old_token["access_token"];
                    return 0;
                }
            }
        }


        $auth = $this->getToken();
        if (isset($auth["access_token"])) {
            $this->access_token = $auth["access_token"];
        }
        $auth["created_at"] = Carbon::now();

        // Define the file path
        $filePath = 'auth.json';

        // Write the JSON data to the file using Laravel's Storage facade
        Storage::disk('public')->put($filePath, json_encode($auth));


    }

    public function getToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_api . '/v2/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSLCERT => storage_path('certs/ks-intershop.cert'),
            CURLOPT_SSLKEY => storage_path('certs/ks-intershop.key'),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . base64_encode($this->consumer_id . ":" . $this->consumer_secret),
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }

    public function createThaiQr($txn_id, $amount, $ref1 = "", $ref2 = "", $ref3 = "", $ref4 = "")
    {
        $data = [
            "merchantId" => $this->merchant_id,
            "partnerId" => $this->partner_id,
            "partnerSecret" => $this->partner_secret,
            "partnerTxnUid" => $txn_id,
            "qrType" => "3",
            "reference1" => $ref1,
            "reference2" => $ref2,
            "reference3" => $ref3,
            "reference4" => $ref4,
            "requestDt" => Carbon::now()->format('Y-m-d\TH:i:sP'),
            "txnAmount" => $amount,
            "txnCurrencyCode" => "THB"
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->base_api . '/v1/qrpayment/request');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLCERT, storage_path('certs/ks-intershop.cert'));
        curl_setopt($ch, CURLOPT_SSLKEY, storage_path('certs/ks-intershop.key'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->access_token,
            'Content-Type: application/json'
        ));

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return null;
        }
        curl_close($ch);

        return json_decode($result, true);
    }

    public function createCreditQr()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://openapi-sandbox.kasikornbank.com/v1/qrpayment/request');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"merchantId\":\"KB102057149704\",\"partnerId\":\"PTR1051673\",\"partnerSecret\":\"d4bded59200547bc85903574a293831b\",\"partnerTxnUid\":\"PARTNERTEST0001-2\",\"qrType\":4,\"reference1\":\"INV001\",\"reference2\":\"HELLOWORLD\",\"reference3\":\"INV001\",\"reference4\":\"INV001\",\"requestDt\":\"2024-07-08T13:40:56+07:00\",\"txnAmount\":\"120.00\",\"txnCurrencyCode\":\"THB\"}");

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9,th;q=0.8,my;q=0.7';
        $headers[] = 'Authorization: Bearer iBKvlEsariXd9lkgAy23N3tbclpd';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Origin: https://apiportal.kasikornbank.com';
        $headers[] = 'Pragma: no-cache';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        $headers[] = 'Env-Id: QR003';
        $headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"macOS\"';
        $headers[] = 'X-Test-Mode: true';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    public function getStatus($txn_id, $terminalId = "")
    {
        $data = [
            "merchantId" => $this->merchant_id,
            "partnerId" => $this->partner_id,
            "partnerSecret" => $this->partner_secret,
            "partnerTxnUid" => $txn_id,
            "origPartnerTxnUid" => $txn_id,
            "requestDt" => Carbon::now()->format('Y-m-d\TH:i:sP'),
            "terminalId" => $terminalId
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->base_api . '/v1/qrpayment/v4/inquiry');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9,th;q=0.8,my;q=0.7';
        $headers[] = 'Authorization: Bearer ' . $this->access_token;
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Origin: https://apiportal.kasikornbank.com';
        $headers[] = 'Pragma: no-cache';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        $headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Sec-Ch-Ua-Platform: \"macOS\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }

    public function cancellBill($partnerTxnUid, $requestDt)
    {
        $data = [
            "merchantId" => $this->merchant_id,
            "partnerId" => $this->partner_id,
            "partnerSecret" => $this->partner_secret,
            "partnerTxnUid" => $partnerTxnUid,
            "origPartnerTxnUid" => $partnerTxnUid,
            "requestDt" => $requestDt,
            "terminalId" => "09000107"
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_api . '/v1/qrpayment/cancel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSLCERT => storage_path('certs/ks-intershop.cert'),
            CURLOPT_SSLKEY => storage_path('certs/ks-intershop.key'),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->access_token,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }

    public function QrCallback(Request $request)
    {
        $check = KbankTransaction::where('txn_id','=',$request->partnerTxnUid)->fiirst();
        if ($check){
            $check->status = "PAID";
            $check->save();
        }

        return response()->json([
            "statusCode" => "00",
            "errorCode" => null,
            "errorDesc" => null
        ]);
    }

}
