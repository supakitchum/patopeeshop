<?php

namespace App\Http\Controllers\Services\Payments;

use App\Model\KbankApiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KbankService extends Controller
{
    public $base_api = "https://openapi-sandbox.kasikornbank.com";
    public $cusumer_id = "IZhWbQjXtRc7n4nAmdWa424ZpeBwatZ2";
    public $consumer_secret = "9PXcgwm2xW57AWDU";

    public function getToken()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->base_api . '/v2/oauth/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Language: en-US,en;q=0.9,th;q=0.8,my;q=0.7';
        $headers[] = 'Authorization: Basic ' . base64_encode($this->cusumer_id . ":" . $this->consumer_secret);
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Pragma: no-cache';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        $headers[] = 'Env-Id: OAUTH2';
        $headers[] = 'X-Test-Mode: true';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }

    public function createThaiQr()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://openapi-sandbox.kasikornbank.com/v1/qrpayment/request');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"partnerTxnUid\":\"PARTNERTEST0001\",\"partnerId\":\"PTR1051673\",\"partnerSecret\":\"d4bded59200547bc85903574a293831b\",\"merchantId\":\"KB102057149704\",\"qrType\":3,\"txnAmount\":\"120.00\",\"txnCurrencyCode\":\"THB\",\"requestDt\":\"2024-07-08T13:40:56+07:00\",\"reference1\":\"INV001\",\"reference2\":\"HELLOWORLD\",\"reference3\":\"INV001\",\"reference4\":\"INV001\"}");

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
        $headers[] = 'Env-Id: QR002';
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

    public function getStatus()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://openapi-sandbox.kasikornbank.com/v1/qrpayment/v4/inquiry');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"partnerId\":\"PTR1051673\",\"partnerSecret\":\"d4bded59200547bc85903574a293831b\",\"merchantId\":\"KB102057149704\",\"partnerTxnUid\":\"PARTNERTEST0002\",\"origPartnerTxnUid\":\"PARTNERTEST0001\",\"requestDt\":\"2024-07-08T13:40:56+07:00\"}");

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
        $headers[] = 'Env-Id: QR004';
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

    public function sendApi($method, $url, $env_id = "", $data = [])
    {
        $cusumer_id = "IZhWbQjXtRc7n4nAmdWa424ZpeBwatZ2";
        $consumer_secret = "9PXcgwm2xW57AWDU";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->base_api . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($method === "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);

            if (sizeof($data) > 0) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
        }

        $headers = array();
        if ($env_id === "OAUTH2") {
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        } else {
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        }
        $headers[] = 'x-test-mode: true';
        $headers[] = 'env-id: ' . $env_id;
        $headers[] = 'Authorization: Basic ' . base64_encode($cusumer_id . ":" . $consumer_secret);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }

}

vq4vHj3XsM2TFuloK8ZSq6dxNal2

{
    "partnerId": "PTR1051673",
  "partnerSecret": "d4bded59200547bc85903574a293831b",
  "merchantId": "KB102057149704",
    "partnerTxnUid": "PARTNERTEST0003",
  "origPartnerTxnUid" : "TESTCANCELQR001",
  "requestDt" : "2024-07-08T13:40:56+07:00"
}
