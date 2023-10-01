<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\LaporanPembelianBahanBakuController;
use App\Http\Controllers\LaporanPengeluaranRestoranController;
use App\Http\Controllers\LaporanPenguranganBahanBakuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianBahanBakuController;
use App\Http\Controllers\PengeluaranRestoranController;
use App\Http\Controllers\PenguranganBahanBakuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekeningController;
use Illuminate\Support\Facades\Auth;
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

        Route::resource('produk', ProdukController::class);

        Route::resource('rekening', RekeningController::class);

        Route::resource('bahanBaku', BahanBakuController::class);

        Route::resource('pembelianBahanBaku', PembelianBahanBakuController::class);

        Route::resource('penguranganBahanBaku', PenguranganBahanBakuController::class);

        Route::resource('laporanPembelianBahanBaku', LaporanPembelianBahanBakuController::class);

        Route::resource('laporanPenguranganBahanBaku', LaporanPenguranganBahanBakuController::class);

        Route::resource('laporanPengeluaranRestoran', LaporanPengeluaranRestoranController::class);

        Route::resource('pengeluaranRestoran', PengeluaranRestoranController::class);

        Route::resource('kelolaPengguna', KelolaPenggunaController::class);

        Route::resource('meja', MejaController::class)->only(['update', 'index']);

        Route::resource('profil', ProfileController::class)->only(['index', 'edit', 'update']);

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('kategori', KategoriProdukController::class);
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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
    Route::get('/order/cetak_nota/{kode}', 'App\Http\Controllers\OrderController@cetakNota');
});


Route::get('test', function () {
    event(new App\Events\StatusLiked("201511052", "Muhammad Irfan Noor Wahid"));
    return "Event has been sent!";
});

// CUSTOMER
Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::post('order', [CustomerController::class, 'order'])->name('customer.order');
Route::get('contact', [CustomerController::class, 'contact'])->name('customer.contact');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('/', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
