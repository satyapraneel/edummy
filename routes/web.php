<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any ('login', [ 'as' => 'login', 'uses' => function() {
    return response()->json(['unauthorized API. set Authorization header']);
}]);
Route::get('/', function () {
    return view('welcome');
});
