<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianBahanBakuController;
use App\Http\Controllers\PengeluaranBahanBakuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekeningController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {



        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard-admin');


        Route::resource('pelanggan', PelangganController::class);

        Route::resource('rekening', RekeningController::class);

        Route::resource('bahanBaku', BahanBakuController::class);

        Route::resource('pembelianBahanBaku', PembelianBahanBakuController::class);

        Route::resource('pengeluaranBahanBaku', PengeluaranBahanBakuController::class);

        Route::resource('meja', MejaController::class)
            ->only(['update', 'index']);

        Route::resource('profil', ProfileController::class)
            ->only(['index', 'edit', 'update']);

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
});

Route::get('/order/pendingDanProses', 'App\Http\Controllers\OrderController@pendingDanProses')->name('order.pendingDanProses');
Route::get('/order/dibayar', 'App\Http\Controllers\OrderController@dibayar');
Route::get('/order/dibatalkan', 'App\Http\Controllers\OrderController@dibatalkan');
Route::get('/order/dibatalkan/edit/{kode}', 'App\Http\Controllers\OrderController@editDibatalkan')->name('order.dibatalksan.edit');
Route::get('/order/dibayar/edit/{kode}', 'App\Http\Controllers\OrderController@editDibayar')->name('order.dibayar.edit');
Route::get('/order/pendingDanProses/edit/{kode}', 'App\Http\Controllers\OrderController@editPending')->name('order.pending-dan-proses.edit');
Route::put('/order/pendingDanProses/edit-status/{id}', 'App\Http\Controllers\OrderController@editStatus')->name('order.pending-dan-proses.update-status');

Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer-view');
