<?php

use App\Http\Controllers\MemberLookupController;
use Illuminate\Http\Request;
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
});
