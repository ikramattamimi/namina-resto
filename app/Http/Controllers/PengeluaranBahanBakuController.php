<?php

namespace App\Http\Controllers;

use App\Models\PenguranganBahanBaku;
use Illuminate\Http\Request;

class PengeluaranBahanBakuController extends Controller
{
    public function index()
    {
        return view('pengeluaranBahanBaku.index', [
            'pengeluaranBahanBakus' => PenguranganBahanBaku::with('bahan_baku')->get(),
        ]);
    }
}
