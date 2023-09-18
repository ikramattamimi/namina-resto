<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index()
    {
        return view('bahanBaku.index', [
            'bahanBakus' => BahanBaku::all(),
        ]);
    }
}
