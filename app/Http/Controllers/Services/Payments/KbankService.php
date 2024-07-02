<?php

namespace App\Http\Controllers\Services\Payments;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KbankService extends Controller
{
    function inquiry(Request $request)
    {
        if (isset($request->functionName)) {
            if ($request->functionName === "BillLookup") {
                return $this->BillLookup($request);
            }
        }

        return response()->json([
            "code" => 1000,
            "message" => "Method Error"
        ], 400);
    }

    function BillLookup($request)
    {
        $response = [
            "functionName " => "BillLookupResponse",
            "transactionId" => $request->transactionId,
            "transactionDateTime" => Carbon::now(),
            "billerTransactionId" => $request->transactionId,
            "responseCode" => "0000",
            "responseDescription" => "Success",
            "billerType" => $request->billerType,
            "billerId" => $request->billerId,
            "terminalNo" => $request->terminalNo,
            "promptPayTransactionId" => "",
            "typeofReceiver" => "",
            "reference1" => $request->reference1,
            "reference2" => $request->reference2,
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
    }
}
