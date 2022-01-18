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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('rates')->group(function () {
    Route::get('', 'RateController@index')->name('rates.index');
    Route::post('store-data-from-service', 'RateController@storeDataFromService'); // disabled csrf
});
