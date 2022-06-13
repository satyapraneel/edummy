<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelTransactionRequest;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\LinkPartnerRequest;
use Illuminate\Http\Request;

class PartnerConversionController extends Controller
{
    public function cancelTransaction(CancelTransactionRequest $request) {
        return response()->json([
            "UniqueId" => "1-129".rand(1000, 9999),
            "Result" =>  "True",
            "Message" => "Transaction Cancelled Successfully"
        ]);
    }

    public function createTransaction(CreateTransactionRequest $request) {
        return response()->json([
            "transaction_number" => "1-129947899". rand(1000, 9999),
            "Result" =>  "True",
            "Message" => "Transfer Successful",
            "transaction_id" =>  "1-I2L6E6U".rand(1000, 9999)
        ]);
    }

    public function linkAccount(LinkPartnerRequest $request) {
        return response()->json([
            "CardNumber" => "1800000011564100",
            "Result" =>  true,
            "Message" => "Membership account updated with Smile Information"
        ]);
    }

    public function convertShukransToNeqaty() {
        return response()->json([
            // "ReferenceNumber" => "1-129".rand(1000, 9999),
            "ReferenceNumber" => "28858 05143 10609 ".rand(10000, 99999),
            "Result" =>  true,
            "Message" => "Transfer Successful"
        ]);
    }
}