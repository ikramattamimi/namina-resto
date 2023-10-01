<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Pesanan;
use App\Models\ProdukDipesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $bulanIni = now()->format('Y-m');
            $tanggalHariIni = now()->format('Y-m-d');
            return view('welcome', [
                'produk' => ProdukDipesan::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])->count(),
                'nota' => Pesanan::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])->whereNotIn('status_pesanan_id', [4])->count(),
                'pending' => Pesanan::all()->where('status_pesanan_id', 1)->count(),
                'proses' => Pesanan::all()->where('status_pesanan_id', 2)->count(),
                'stoks' => BahanBaku::orderBy('stok', 'asc')->take(5)->get(),
                'nota_today' => Pesanan::whereDate('created_at', $tanggalHariIni)->whereNotIn('status_pesanan_id', [4])->count(),
                'produk_today' => ProdukDipesan::whereDate('created_at', $tanggalHariIni)->count(),
                'produks' => ProdukDipesan::select('produk_id', DB::raw('SUM(qty) as total_terjual'))
                    ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])
                    ->groupBy('produk_id')
                    ->orderByDesc('total_terjual')
                    ->take(5)
                    ->get()
            ]);
        } else return view('auth.login');
    }
}
