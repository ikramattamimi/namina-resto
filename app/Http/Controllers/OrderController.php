<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // =========================MENU ORDER PENDING DAN PROSES=============================
    public function pendingDanProses(){
        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Pending')
                              ->orWhere('status_pesanans.nama', 'Proses');
                    })
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.pending-dan-proses.index', ['data' => $data, 'status' => $status]);
    }

    public function getTableData(){
        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                ->where(function ($query) {
                    $query->where('status_pesanans.nama', 'Pending')
                          ->orWhere('status_pesanans.nama', 'Proses');
                })
                ->orderBy('pesanans.id', 'DESC')
                ->get(['pesanans.kode', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.created_at', 'status_pesanans.nama AS nama_status']);
                
        return response()->json(['data' => $data], 200);
    }   

    public function editPending($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'produks.diskon', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

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

    public function editQty(Request $request, $kode, $id) {
        
        $kode = (int)$kode;
        $id = (int)$id;

        DB::table('produk_dipesan')
            ->where('pesanan_id', $kode)
            ->where('produk_id', $id)
            ->update(['qty' => $request->input('qty')]);
        
        // $pesanan = ProdukDipesan::where('pesanan_id', $kode)
        //     ->where('produk_id', $id)
        //     ->firstOrFail();
        // if (!$pesanan) {
        //     return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        // }

        // $pesanan->qty = $request->input('qty');

        // $pesanan->save();

        // Redirect atau berikan respons yang sesuai
        return redirect()->back()->with('success', 'Status Pesanan berhasil diubah.');
    }


    public function deleteProdukDipesan($kode, $id){
        DB::table('produk_dipesan')
            ->where('pesanan_id', $kode)
            ->where('produk_id', $id)
            ->delete();

        // $pesanan = ProdukDipesan::where('pesanan_id', $kode)
        //                             ->where('produk_id', $id)
        //                             ->firstOrFail();

        // $pesanan->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    // =========================MENU ORDER DIBAYAR================================
    public function dibayar(){
        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibayar')
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.dibayar.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibayar($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'produks.diskon', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('order.dibayar.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    // =========================MENU ORDER DIBATALKAN================================
    public function dibatalkan(){
        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibatalkan')
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.dibatalkan.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibatalkan($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'produks.diskon', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('order.dibatalkan.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    // =============================INVOICE===================================
    public function invoice(){
        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Invoice');
                    })
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::all();

        return view('order.invoice.index', ['data' => $data, 'status' => $status]);
    }

    public function editInvoice($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'produks.diskon', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('order.invoice.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    public function bayarPesanan(Request $request, $kode){
        if($request->input('tipe_bayar') == "Debit" || $request->input('tipe_bayar') == "Cash"){

            $pesanan = Pesanan::where('kode', $kode)->firstOrFail();
            
            if (!$pesanan) {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
            }

            $pesanan->status_pesanan_id = 3;
            $pesanan->save();

            $rekening = new Rekening;
            $rekening->nama = $request->tipe_bayar;
            if($request->input('tipe_bayar') == "Debit"){
                $rekening->nomor = 123456;
            }
            $rekening->jumlah = intval($request->totalakhir);
            $rekening->save();

            return $this->dibayar();
        }else{
            $pesanan = Pesanan::where('kode', $kode)->firstOrFail();
            
            if (!$pesanan) {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
            }

            $pesanan->status_pesanan_id = 5;
            $pesanan->save();

            return $this->invoice();
        }
    }

    public function cetakNota($kode){
        $order = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                            ->where('pesanans.kode', $kode)
                            ->get(['pesanans.kode', 'pesanans.created_at', 'pesanans.no_meja', 'pelanggans.nama']);

        $dapur_utama = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                            ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                            ->join('kategori_produks', 'produks.kategori_produk_id', 'kategori_produks.id')
                            ->join('kategori_dapurs', 'kategori_produks.dapur_id', 'kategori_dapurs.id')
                            ->where('pesanans.kode', $kode)
                            ->where('kategori_dapurs.nama', "Dapur Utama")
                            ->get(['produks.nama', 'produk_dipesan.qty', 'produk_dipesan.catatan']);

        $dapur_cemilan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                            ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                            ->join('kategori_produks', 'produks.kategori_produk_id', 'kategori_produks.id')
                            ->join('kategori_dapurs', 'kategori_produks.dapur_id', 'kategori_dapurs.id')
                            ->where('pesanans.kode', $kode)
                            ->where('kategori_dapurs.nama', "Dapur Cemilan")
                            ->get(['produks.nama', 'produk_dipesan.qty', 'produk_dipesan.catatan']);

        $bar = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                            ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                            ->join('kategori_produks', 'produks.kategori_produk_id', 'kategori_produks.id')
                            ->join('kategori_dapurs', 'kategori_produks.dapur_id', 'kategori_dapurs.id')
                            ->where('pesanans.kode', $kode)
                            ->where('kategori_dapurs.nama', "Bar")
                            ->get(['produks.nama', 'produk_dipesan.qty', 'produk_dipesan.catatan']);
        
        return view('order.dibayar.nota-dapur', ['dapur_utama' => $dapur_utama, 'dapur_cemilan' => $dapur_cemilan, 'bar' => $bar,'order'=>$order]);
    }

}


