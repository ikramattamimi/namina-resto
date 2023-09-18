<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\StatusPesanan;

class OrderController extends Controller
{
    // =========================MENU ORDER PENDING DAN PROSES=============================
    public function pendingDanProses(){
        $data = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Pending')
                              ->orWhere('status_pesanans.nama', 'Proses');
                    })
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.pending-dan-proses.index', ['data' => $data, 'status' => $status]);
    }

    public function editPending($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.nama AS nama_produk', 'produks.harga_jual']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp']);

        return view('order.pending-dan-proses.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    public function editStatus(Request $request, $id) {

        // Ambil model Pesanan berdasarkan $id
        $pesanan = Pesanan::where('kode', $id)->firstOrFail();
        
        if (!$pesanan) {
            // Tambahkan logika jika Pesanan dengan $id tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    
        // Ubah nilai id_status sesuai dengan input yang baru
        $pesanan->status_pesanan_id = $request->input('status_id');
    
        // Simpan perubahan
        $pesanan->save();
    
        // Redirect atau berikan respons yang sesuai
        return redirect()->back()->with('success', 'Status Pesanan berhasil diubah.');
    }

    // =========================MENU ORDER DIBAYAR================================
    public function dibayar(){
        $data = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibayar')
                    ->get(['pesanans.kode', 'pelanggans.nama','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.dibayar.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibayar($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.nama AS nama_produk', 'produks.harga_jual', 'pesanans.created_at']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp']);

        return view('order.dibayar.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    // =========================MENU ORDER DIBATALKAN================================
    public function dibatalkan(){
        $data = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibatalkan')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.dibatalkan.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibatalkan($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.nama AS nama_produk', 'produks.harga_jual']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.pelanggan_id', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp']);

        return view('order.dibatalkan.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }
}
