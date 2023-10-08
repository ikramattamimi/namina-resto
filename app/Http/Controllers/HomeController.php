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

            // Count the number of ProdukDipesan with specific conditions
            $produkCount = ProdukDipesan::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])
                ->whereHas('pesanan', function ($query) {
                    $query->whereNotIn('status_pesanan_id', [1, 4]);
                })->count();

            // Count the number of Pesanan with specific conditions
            $notaCount = Pesanan::whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])
                ->whereNotIn('status_pesanan_id', [4, 1])
                ->count();

            // Count the number of pending Pesanan
            $pendingCount = Pesanan::where('status_pesanan_id', 1)->count();

            // Count the number of Pesanan in progress
            $prosesCount = Pesanan::where('status_pesanan_id', 2)->count();

            // Retrieve the top 5 stoks ordered by stok
            $stoks = BahanBaku::orderBy('stok', 'asc')->take(5)->get();

            // Count the number of Pesanan created today
            $notaTodayCount = Pesanan::whereDate('created_at', $tanggalHariIni)
                ->whereNotIn('status_pesanan_id', [4, 1])
                ->count();

            // Count the number of ProdukDipesan created today with specific conditions
            $produkTodayCount = ProdukDipesan::whereDate('created_at', $tanggalHariIni)
                ->whereHas('pesanan', function ($query) {
                    $query->whereNotIn('status_pesanan_id', [1, 4]);
                })->count();

            // Retrieve the top 5 produk_id with the highest total_terjual
            $produks = ProdukDipesan::select('produk_id', DB::raw('SUM(qty) as total_terjual'))
                ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$bulanIni])
                ->groupBy('produk_id')
                ->orderByDesc('total_terjual')
                ->take(5)
                ->get();

            // Calculate the total for Pesanan created today
            $totalToday = Pesanan::whereDate('created_at', $tanggalHariIni)
                ->whereNotIn('status_pesanan_id', [1, 4])
                ->sum('total_bayar');

            // Calculate the total for Pesanan with status_pesanan_id is 3 or and 5 created this year for each month
            $currentYear = date('Y');

            $pendapatanBulanan = Pesanan::select(
                DB::raw('DATE_FORMAT(created_at, "%M") as month_name'),
                DB::raw('SUM(total_bayar) as total_bayar_per_month')
            )
                ->whereYear('created_at', $currentYear)
                ->whereIn('status_pesanan_id', [3, 5]) // Filter by status_pesanan_id
                ->groupBy(DB::raw('DATE_FORMAT(created_at, "%M"), MONTH(created_at)'))
                ->get()
                ->pluck('total_bayar_per_month', 'month_name')
                ->toArray();

            // Create an array of data to be passed to the view
            $data = [
                'produk' => $produkCount,
                'nota' => $notaCount,
                'pending' => $pendingCount,
                'proses' => $prosesCount,
                'stoks' => $stoks,
                'nota_today' => $notaTodayCount,
                'produk_today' => $produkTodayCount,
                'produks' => $produks,
                'total' => $totalToday,
                'pendapatan_bulanan' => $pendapatanBulanan,
            ];

            return view('welcome', $data);
        } else {
            return view('auth.login');
        }
    }
}
