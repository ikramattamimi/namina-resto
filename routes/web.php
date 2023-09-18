<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PelangganController;
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

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('meja', MejaController::class)->only(['update', 'index']);

    Route::resource('profil', ProfileController::class)
        ->only(['index', 'edit', 'update']);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//Bahan Baku
Route::resource('bahanBaku', BahanBakuController::class)
    ->only(['index']);
