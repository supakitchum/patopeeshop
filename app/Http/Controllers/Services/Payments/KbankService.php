<?php

namespace App\Http\Controllers\Services\Payments;

use App\Model\KbankApiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KbankService extends Controller
{
    public function BillLookupError($request, $responseCode, $responseDescription)
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

    public function BillLookupSuccess($request, $responseCode, $responseDescription, $amount, $reference2 = "", $info = true)
    {
        if (isset($request->language) && $request->language === "EN") {
            // Inquiry Info EN Language (8)
            $response = [
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
                "reference2" => $request->reference2 ?? $reference2,
                "reference3" => "",
                "tranAmount" => $amount,
                "info1" => $info ? "Customer Name EN" : "",
                "info2" => $info ? "Product Information EN" : "",
                "info3" => $info ? "Other Information EN" : "",
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
            // Inquiry Info TH Language (9)
            $response = [
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
                "reference2" => $request->reference2 ?? $reference2,
                "reference3" => "",
                "tranAmount" => $amount,
                "info1" => $info ? "ชื่อลูกค้า" : "",
                "info2" => $info ? "ชื่อสินค้า" : "",
                "info3" => $info ? "อื่นๆ" : "",
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

        return response()->json($response);
    }

    public function BillLookupPromptPaySuccess($request, $responseCode, $responseDescription, $amount, $reference2 = "")
    {
        if (isset($request->language) && $request->language === "EN") {
            $response = [
                "functionName" => "BillLookupResponse",
                "transactionId" => $request->transactionId ?? "",
                "transactionDateTime" => Carbon::now(),
                "billerTransactionId" => $request->transactionId ?? "",
                "responseCode" => $responseCode,
                "responseDescription" => $responseDescription,
                "billerType" => $request->billerType ?? "",
                "billerId" => $request->billerId ?? "",
                "terminalNo" => $request->terminalNo ?? "",
                "promptPayTransactionId" => $request->promptPayReferenceNumber ?? "",
                "typeofReceiver" => "C",
                "reference1" => $request->reference1 ?? "",
                "reference2" => $request->reference2 ?? $reference2,
                "reference3" => "",
                "info1" => "Customer Name EN",
                "info2" => "Product Information EN",
                "info3" => "Other Information EN",
                "additional" => [
                    "toBillerAccountName" => "",
                    "toBillerServiceName" => "",
                    "payerFee" => "",
                    "settlementDate" => "",
                    "receiverTaxID" => "",
                    "dueDate" => "",
                    "qrReference" => "",
                    "mAppId" => ""
                ]
            ];
        } else {
            $response = [
                "functionName" => "BillLookupResponse",
                "transactionId" => $request->transactionId ?? "",
                "transactionDateTime" => Carbon::now(),
                "billerTransactionId" => $request->transactionId ?? "",
                "responseCode" => $responseCode,
                "responseDescription" => $responseDescription,
                "billerType" => $request->billerType ?? "",
                "billerId" => $request->billerId ?? "",
                "terminalNo" => $request->terminalNo ?? "",
                "promptPayTransactionId" => $request->promptPayReferenceNumber ?? "",
                "typeOfReceiver" => "C",
                "reference1" => $request->reference1 ?? "",
                "reference2" => $request->reference2 ?? $reference2,
                "reference3" => "",
                "info1" => "ชื่อลูกค้า",
                "info2" => "ชื่อสินค้า",
                "info3" => "อื่นๆ",
                "additional" => [
                    "toBillerAccountName" => "",
                    "toBillerServiceName" => "",
                    "payerFee" => "",
                    "settlementDate" => "",
                    "receiverTaxID" => "",
                    "dueDate" => "",
                    "qrReference" => "",
                    "mAppId" => ""
                ]
            ];
        }

        return response()->json($response);
    }

    public function BillLookupPromptPayError($request, $responseCode, $responseDescription)
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
            "promptPayTransactionId" => $request->promptPayReferenceNumber ?? "",
            "typeofReceiver" => "C",
            "reference1" => $request->reference1 ?? "",
            "reference2" => $request->reference2 ?? "",
            "reference3" => "",
            "info1" => "",
            "info2" => "",
            "info3" => "",
            "additional" => [
                "toBillerAccountName" => "",
                "toBillerServiceName" => "",
                "payerFee" => "",
                "settlementDate" => "",
                "receiverTaxID" => "",
                "dueDate" => "",
                "qrReference" => "",
                "mAppId" => ""
            ]
        ]);
    }

    public function BillLookup(Request $request)
    {
        if (isset($request->billerType) && $request->billerType === "BILLERID")
            return $this->BillLookupPromptpay($request);

        if (!isset($request->reference1)) {
            return $this->BillLookupError($request, "0001", "Invalid Payment reference number");
        }

        if (!ctype_digit($request->reference1)) {
            // Inquiry Invalid Ref 1 (4)
            return $this->BillLookupError($request, "0001", "Invalid Payment reference number");
        }

        if (!isset($request->reference2)) {
            $check_bill = KbankApiLog::where('transactionId', '=', $request->transactionId)
                ->where('reference1', '=', $request->reference1)->first();
            if (isset($check_bill->id)) {
                // Inquiry Reference 1 for return Reference 2 and amount Success (10)
                return $this->BillLookupSuccess($request, "0000", "Success", $check_bill->tranAmount, $check_bill->reference2, false);
            } else {
                return $this->BillLookupError($request, "0001", "Invalid Payment reference number");
            }
        }

        if (!ctype_digit($request->reference2)) {
            // Inquiry Invalid Ref 1 and 2 (5)
            return $this->BillLookupError($request, "0001", "Invalid Payment reference number");
        }

        $check_bill = KbankApiLog::where('transactionId', '=', $request->transactionId)
            ->where('reference1', '=', $request->reference1)
            ->where('reference2', '=', $request->reference2)
            ->first();
        if (isset($check_bill->id)) {
            if (!isset($check_bill->transactionId)) {
                KbankApiLog::where('id', '=', $check_bill->id)->update([
                    'transactionId' => $request->transactionId
                ]);
            }

            if (!preg_match('/^\d+(\.\d{1,2})?$/', $request->tranAmount) || $request->tranAmount !== $check_bill->tranAmount) {
                // Inquiry Invalid Amount (6)
                return $this->BillLookupError($request, "0004", "Invalid payment amount");
            }

            //  Inquiry Other Merchant Error (Fixed Response) (7)
            if ($request->transactionId === "98099310720200530183382105") {
                return $this->BillLookupError($request, "1000", "Other Merchant Error");
            }

            //  ชำระเงินแล้ว
            if ($check_bill->status) {
                // Inquiry Already Paid (3)
                return $this->BillLookupSuccess($request, "0002", "Already paid", $check_bill->tranAmount);
            }

            //  Inquiry Success (1)
            return $this->BillLookupSuccess($request, "0000", "Success", $check_bill->tranAmount);

        }

        return $this->BillLookupError($request, "0001", "Invalid Payment reference number");
    }

    public function BillPayment(Request $request)
    {
        if (isset($request->billerType) && $request->billerType === "BILLERID")
            return $this->BillPaymentPromptpay($request);

        if (!isset($request->isRetry) || (int)$request->isRetry !== 1) {
            // BillPayment Success (2)
            KbankApiLog::where('transactionId', '=', $request->transactionId)->update([
                "status" => true
            ]);

        }

        // BillPayment Reference 1 for return Reference 2 and amount Success (11)
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

        return response()->json($response);
    }

    public function BillLookupPromptpay($request)
    {
        if (!isset($request->reference1)) {
            return $this->BillLookupPromptPayError($request, "0001", "Invalid Payment reference number");
        }

        if (!ctype_digit($request->reference1)) {
            // PromptPay Inquiry Invalid Ref 1 (15)
            return $this->BillLookupPromptPayError($request, "0001", "Invalid Payment reference number");
        }

        if (!isset($request->reference2)) {
            $check_bill = KbankApiLog::where('transactionId', '=', $request->transactionId)
                ->where('reference1', '=', $request->reference1)
                ->first();
            if (isset($check_bill->id)) {
                // Inquiry Reference 1 for return Reference 2 and amount Success (10)
                return $this->BillLookupPromptPaySuccess($request, "0000", "Success", $check_bill->tranAmount, $check_bill->reference2);
            } else {
                return $this->BillLookupPromptPayError($request, "0001", "Invalid Payment reference number");
            }
        }

        if (!ctype_digit($request->reference2)) {
            // PromptPay Inquiry Invalid Ref 1 and 2 (16)
            return $this->BillLookupPromptPayError($request, "0001", "Invalid Payment reference number");
        }

        $check_bill = KbankApiLog::where('transactionId', '=', $request->transactionId)
            ->where('reference1', '=', $request->reference1)
            ->where('reference2', '=', $request->reference2)
            ->first();
        if (isset($check_bill->id)) {
            if (!isset($check_bill->transactionId)) {
                KbankApiLog::where('id', '=', $check_bill->id)->update([
                    'transactionId' => $request->transactionId
                ]);
            }

            if (!preg_match('/^\d+(\.\d{1,2})?$/', $request->tranAmount) || $request->tranAmount !== $check_bill->tranAmount) {
                // PromptPay Inquiry Invalid Amount (17)
                return $this->BillLookupPromptPayError($request, "0004", "Invalid payment amount");
            }

            //  PromptPay Inquiry Other Merchant Error (Fixed Response) (18)
            if ($request->transactionId === "KBNK_20191009_000000000000105") {
                return $this->BillLookupPromptPayError($request, "1000", "Other Merchant Error");
            }

            //  ชำระเงินแล้ว
            if ($check_bill->status) {
                // PromptPay Inquiry Already Paid (14)
                return $this->BillLookupPromptPaySuccess($request, "0002", "Already paid", $check_bill->tranAmount);
            }

            //  PromptPay Inquiry Success (12)
            return $this->BillLookupPromptPaySuccess($request, "0000", "Success", $check_bill->tranAmount);

        }

        return $this->BillLookupPromptPayError($request, "0001", "Invalid Payment reference number");
    }

    public function BillPaymentPromptpay(Request $request)
    {
        if (!isset($request->isRetry) || (int)$request->isRetry !== 1) {
            KbankApiLog::where('transactionId', '=', $request->transactionId)->update([
                "status" => true
            ]);

        }

        // PromptPay BillPayment Success (13)
        $response = [
            "functionName" => "BillPaymentResponse",
            "transactionId" => $request->transactionId ?? "",
            "responseDateTime" => Carbon::now(),
            "billerTransactionId" => $request->transactionId ?? "",
            "responseCode" => "0000",
            "responseDescription" => "Success",
            "terminalNo" => $request->terminalNo ?? "",
            "promptPayTransactionId" => $request->promptPayReferenceNumber ?? "",
            "additional" => [
                "settlementDate" => "",
                "rsAppId" => ""
            ]
        ];

        return response()->json($response);
    }

}
