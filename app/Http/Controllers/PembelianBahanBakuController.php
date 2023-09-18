<?php

namespace App\Http\Controllers;

use App\Models\PembelianBahanBaku;
use Illuminate\Http\Request;

class PembelianBahanBakuController extends Controller
{
    public function index()
    {
        return view('pembelianBahanBaku.index', [
            'pembelianBahanBakus' => PembelianBahanBaku::with('bahan_baku')->get(),
        ]);
    }
}
