<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberLookupController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::any("infrastructure/scripts/GetProfileDetails/invoke", [MemberLookupController::class, 'lookup']);
    
    Route::post("profiles", [MemberLookupController::class, 'memberEnrollment']);
    Route::get("transaction/rawtransactions/{TransactionId}", [InvoiceController::class, 'getInvoiceDetails']);
});