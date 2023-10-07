<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\KasirOrderController;
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

Route::prefix('admin')->group(function () {



    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard-admin');


    Route::resource('pelanggan', PelangganController::class);

    Route::resource('rekening', RekeningController::class);

    Route::resource('bahanBaku', BahanBakuController::class);

    Route::resource('pembelianBahanBaku', PembelianBahanBakuController::class);

    Route::resource('pengeluaranBahanBaku', PengeluaranBahanBakuController::class);

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/order/pendingDanProses', 'App\Http\Controllers\OrderController@pendingDanProses')->name('order.pendingDanProses');
    Route::get('/order/dibayar', 'App\Http\Controllers\OrderController@dibayar');
    Route::get('/order/dibatalkan', 'App\Http\Controllers\OrderController@dibatalkan');
    Route::get('/order/invoice', 'App\Http\Controllers\OrderController@invoice')->name('order.invoice');

    Route::get('/order/dibatalkan/edit/{kode}', 'App\Http\Controllers\OrderController@editDibatalkan')->name('order.dibatalkan.edit');
    Route::get('/order/dibayar/edit/{kode}', 'App\Http\Controllers\OrderController@editDibayar')->name('order.dibayar.edit');
    Route::get('/order/pendingDanProses/edit/{kode}', 'App\Http\Controllers\OrderController@editPending')->name('order.pending-dan-proses.edit');
    Route::get('/order/invoice/edit/{kode}', 'App\Http\Controllers\OrderController@editInvoice')->name('order.invoice.edit');

    Route::put('/order/pendingDanProses/edit-status/{id}', 'App\Http\Controllers\OrderController@editStatus')->name('order.pending-dan-proses.update-status');
    Route::put('/order/pendingDanProses/edit-qty/{kode}/{id}', 'App\Http\Controllers\OrderController@editQty')->name('order.pending-dan-proses.update-qty');
    Route::delete('/order/pendingDanProses/deleteProduk/{kode:int}/{id:int}', 'App\Http\Controllers\OrderController@deleteProdukDipesan')->name('order.pending-dan-proses.delete-produk-dipesan');
    Route::put('/order/bayarpesanan/{kode}', 'App\Http\Controllers\OrderController@bayarPesanan')->name('order.bayar-pesanan');

    Route::get('/order/source', 'App\Http\Controllers\OrderController@getTableData');
    Route::get('/order/cetak_nota/{kode}', 'App\Http\Controllers\OrderController@cetakNota')->name('order.cetak-nota');

});

Route::prefix('kasir')->group(function () {
    Route::get('/order/pendingDanProses', 'App\Http\Controllers\KasirOrderController@pendingProses')->name('kasir-order.pendingDanProses');
    Route::get('/order/dibayar', 'App\Http\Controllers\KasirOrderController@dibayar');
    Route::get('/order/dibatalkan', 'App\Http\Controllers\KasirOrderController@dibatalkan');
    Route::get('/order/invoice', 'App\Http\Controllers\KasirOrderController@invoice')->name('kasir-order.invoice');

    Route::get('/order/dibatalkan/edit/{kode}', 'App\Http\Controllers\KasirOrderController@editDibatalkan')->name('kasir-order.dibatalkan.edit');
    Route::get('/order/dibayar/edit/{kode}', 'App\Http\Controllers\KasirOrderController@editDibayar')->name('kasir-order.dibayar.edit');
    Route::get('/order/pendingDanProses/edit/{kode}', 'App\Http\Controllers\KasirOrderController@editPending')->name('kasir-order.pending-dan-proses.edit');
    Route::get('/order/invoice/edit/{kode}', 'App\Http\Controllers\KasirOrderController@editInvoice')->name('kasir-order.invoice.edit');

    Route::put('/order/pendingDanProses/edit-status/{id}', 'App\Http\Controllers\KasirOrderController@editStatus')->name('kasir-order.pending-dan-proses.update-status');
    Route::put('/order/pendingDanProses/edit-qty/{kode}/{id}', 'App\Http\Controllers\KasirOrderController@editQty')->name('kasir-order.pending-dan-proses.update-qty');
    Route::delete('/order/pendingDanProses/deleteProduk/{kode:int}/{id:int}', 'App\Http\Controllers\KasirOrderController@deleteProdukDipesan')->name('kasir-order.pending-dan-proses.delete-produk-dipesan');
    Route::put('/order/bayarpesanan/{kode}', 'App\Http\Controllers\KasirOrderController@bayarPesanan')->name('kasir-order.bayar-pesanan');

    Route::get('/order/source', 'App\Http\Controllers\KasirOrderController@getTableData');
    Route::get('/order/cetak_nota/{kode}', 'App\Http\Controllers\KasirOrderController@cetakNota')->name('kasir-order.cetak-nota');
});

Route::get('test', function () {
    event(new App\Events\StatusLiked("201511052", "Muhammad Irfan Noor Wahid"));
    return "Event has been sent!";
});

Route::resource('pelanggan', PelangganController::class)
    ->only(['index', 'create', 'store']);


    Route::resource('meja', MejaController::class)->only(['update', 'index']);

    Route::resource('profil', ProfileController::class)
        ->only(['index', 'edit', 'update']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


