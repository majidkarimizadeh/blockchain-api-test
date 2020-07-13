<?php

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

Route::resource('/eth', ETHController::class)->only([ 
	'index', 'show', 'store'
])->parameters(['eth' => 'address']);

Route::resource('/btc', BTCController::class)->only([ 
	'index', 'show'
])->parameters(['btc' => 'address']);