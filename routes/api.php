<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberLookupController;
use App\Http\Controllers\PartnerConversionController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/login', function () {
    return 'unauthorized API';
});

Route::middleware('auth:api')->group(function () {
    Route::any("infrastructure/scripts/GetProfileDetails/invoke", [MemberLookupController::class, 'lookup']);
    Route::post("infrastructure/scripts/GetTransactionsByProfileId/invoke", [InvoiceController::class, 'getTransactionsByProfileId']);
    Route::post("infrastructure/scripts/ProcessEcommDetails/invoke", [MemberLookupController::class, "changeLinkStatus"]);
    Route::post("infrastructure/scripts/GetCouponDetails/invoke", [InvoiceController::class, 'getCouponDetails']);
    Route::post("infrastructure/scripts/PartnerCancelTransaction/invoke", [PartnerConversionController::class, 'cancelTransaction']);
    Route::post("infrastructure/scripts/PartnerTransaction/invoke", [PartnerConversionController::class, 'createTransaction']);
    Route::post("infrastructure/scripts/PartnerLinkUnlink/invoke", [PartnerConversionController::class, 'linkAccount']);
    Route::post("infrastructure/scripts/GetPartnerTransactions/invoke", [InvoiceController::class, 'getPartnerTransactions']);
    Route::post("infrastructure/scripts/NeqatyPointConversion/invoke", [PartnerConversionController::class, 'convertShukransToNeqaty']);
    Route::post("infrastructure/scripts/InStoreLMGBenefit/invoke", [MemberLookupController::class, 'updateQRConsent']);
});
Route::post('/authorization/tokens', function(Request $request) {
    $response = Http::asForm()->post('http://dev.epsilon.com/api/v1/authorization/token', $request->all());
 
    return $response->json();
});
