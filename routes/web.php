<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\OrderController;
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

Route::prefix('admin')->group(function () {

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('rekening', RekeningController::class);

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/order/pendingDanProses', 'App\Http\Controllers\OrderController@pendingDanProses')->name('order.pendingDanProses');
Route::get('/order/dibayar', 'App\Http\Controllers\OrderController@dibayar');
Route::get('/order/dibatalkan', 'App\Http\Controllers\OrderController@dibatalkan');
Route::get('/order/detail', 'App\Http\Controllers\OrderController@detail');
Route::get('/order/dibatalkan/edit', 'App\Http\Controllers\OrderController@editDibatalkan');
Route::get('/order/dibayar/edit', 'App\Http\Controllers\OrderController@editDibayar');
Route::get('/order/pendingDanProses/edit/{kode}', 'App\Http\Controllers\OrderController@editPending')->name('order.pending-dan-proses.edit');
Route::put('/order/pendingDanProses/edit-status/{id}', 'App\Http\Controllers\OrderController@editStatus')->name('order.pending-dan-proses.update-status');

Route::resource('pelanggan', PelangganController::class)
    ->only(['index', 'create', 'store']);
