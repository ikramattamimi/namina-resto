<?php

use App\Http\Controllers\PelangganController;
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
})->name('dashboard');

Route::get('/order/pendingAndProses', 'App\Http\Controllers\OrderController@pendingAndProses');
Route::get('/order/dibayar', 'App\Http\Controllers\OrderController@dibayar');
Route::get('/order/dibatalkan', 'App\Http\Controllers\OrderController@dibatalkan');
Route::get('/order/detail', 'App\Http\Controllers\OrderController@detail');

Route::resource('pelanggan', PelangganController::class)
    ->only(['index', 'create', 'store']);
