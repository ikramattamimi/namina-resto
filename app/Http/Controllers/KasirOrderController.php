<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\StatusPesanan;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;
use PDF;

class KasirOrderController extends Controller
{
    // =========================MENU ORDER PENDING DAN PROSES=============================
    public function pendingProses(){
        $waktuSekarang = new DateTime('now');
        $waktuSekarang->setTimezone(new DateTimeZone('Asia/Jakarta'));

        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Pending')
                              ->orWhere('status_pesanans.nama', 'Proses');
                    })
                    ->whereRaw('DATE(pesanans.created_at) = ?', [$waktuSekarang->format('Y-m-d')])
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp', 'pesanans.no_meja', 'pesanans.created_at', 'status_pesanans.nama AS nama_status']);
        $status = StatusPesanan::where('nama', '<>' , 'Dibayar')->get();

        return view('kasir-order.pending-dan-proses.index', ['data' => $data, 'status' => $status]);
    }

    public function getTableData(){
        $waktuSekarang = new DateTime('now');
        $waktuSekarang->setTimezone(new DateTimeZone('Asia/Jakarta'));

        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Pending')
                              ->orWhere('status_pesanans.nama', 'Proses');
                    })
                    ->whereRaw('DATE(pesanans.created_at) = ?', [$waktuSekarang->format('Y-m-d')])
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp', 'pesanans.no_meja', 'pesanans.created_at', 'status_pesanans.nama AS nama_status']);
        
        return response()->json(['data' => $data], 200);
    }   

    public function editPending($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);


        if ($produk_dipesan->isEmpty()) {
            return view('components.no-order');
        }

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('kasir-order.pending-dan-proses.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
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
        $waktuSekarang = new DateTime('now');
        $waktuSekarang->setTimezone(new DateTimeZone('Asia/Jakarta'));


        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibayar')
                    ->whereRaw('DATE(pesanans.created_at) = ?', [$waktuSekarang->format('Y-m-d')])
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::where('nama', '<>' , 'Dibayar')->get();

        return view('kasir-order.dibayar.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibayar($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'pesanans.total_bayar','produks.nama AS nama_produk', 'produks.harga_jual', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        if ($produk_dipesan->isEmpty()) {
            return view('components.no-order');
        }

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('kasir-order.dibayar.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    // =========================MENU ORDER DIBATALKAN================================
    public function dibatalkan(){
        $waktuSekarang = new DateTime('now');
        $waktuSekarang->setTimezone(new DateTimeZone('Asia/Jakarta'));


        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where('status_pesanans.nama', 'Dibatalkan')
                    ->whereRaw('DATE(pesanans.created_at) = ?', [$waktuSekarang->format('Y-m-d')])
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::where('nama', '<>' , 'Dibayar')->get();

        return view('kasir-order.dibatalkan.index', ['data' => $data, 'status' => $status]);
    }

    public function editDibatalkan($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);

        if ($produk_dipesan->isEmpty()) {
            return view('components.no-order');
        }

        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('kasir-order.dibatalkan.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    // =============================INVOICE===================================
    public function invoice(){
        $waktuSekarang = new DateTime('now');
        $waktuSekarang->setTimezone(new DateTimeZone('Asia/Jakarta'));


        $data = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                    ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                    ->where(function ($query) {
                        $query->where('status_pesanans.nama', 'Invoice');
                    })
                    ->whereRaw('DATE(pesanans.created_at) = ?', [$waktuSekarang->format('Y-m-d')])
                    ->orderBy('pesanans.id', 'DESC')
                    ->get(['pesanans.kode', 'pelanggans.nama','pelanggans.no_hp','pesanans.created_at', 'status_pesanans.nama AS nama_status']);

        $status = StatusPesanan::where('nama', '<>' , 'Dibayar')->get();

        return view('kasir-order.invoice.index', ['data' => $data, 'status' => $status]);
    }

    public function editInvoice($kode){
        $produk_dipesan = Pesanan::join('produk_dipesan', 'pesanans.id', '=', 'produk_dipesan.pesanan_id')
                    ->join('produks', 'produk_dipesan.produk_id', 'produks.id')
                    ->where('pesanans.kode', $kode)
                    ->get(['produks.gambar', 'produks.id', 'produks.nama AS nama_produk', 'produks.harga_jual', 'pesanans.kode', 'pesanans.catatan', 'pesanans.id as id_pesanan', 'produk_dipesan.qty', 'produk_dipesan.catatan as catatan_produk']);


        if ($produk_dipesan->isEmpty()) {
            return view('components.no-order');
        }
        
        $pelanggan = Pesanan::join('pelanggans', 'pesanans.id_pelanggan', '=', 'pelanggans.id')
                        ->join('status_pesanans', 'pesanans.status_pesanan_id', '=', 'status_pesanans.id')
                        ->where('pesanans.kode', $kode)
                        ->get(['status_pesanans.nama AS nama_status', 'pelanggans.nama', 'pelanggans.no_hp', 'pesanans.no_meja']);

        return view('kasir-order.invoice.edit', ['pesanan' => $produk_dipesan, 'pelanggan'=> $pelanggan]);
    }

    public function bayarPesanan(Request $request, $kode){
        if($request->input('tipe_bayar') == "Debit"){
            $pesanan = Pesanan::where('kode', $kode)->firstOrFail();
            
            if (!$pesanan) {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
            }

            $pesanan->status_pesanan_id = 3;
            $pesanan->total_bayar = intval($request->totalakhir);
            $pesanan->save();

            $rekening = new Rekening;
            $rekening::where('nama', 'Debit')
                ->increment('saldo', intval($request->totalakhir));

            return $this->dibayar();
        }else if($request->input('tipe_bayar') == "Cash"){
            $pesanan = Pesanan::where('kode', $kode)->firstOrFail();
            
            if (!$pesanan) {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
            }

            $pesanan->status_pesanan_id = 3;
            $pesanan->total_bayar = intval($request->totalakhir);
            $pesanan->save();

            $rekening = new Rekening;
            $rekening::where('nama', 'Cash')
                ->increment('saldo', intval($request->totalakhir));

            return $this->dibayar();
        }else{
            $pesanan = Pesanan::where('kode', $kode)->firstOrFail();
            
            if (!$pesanan) {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
            }

            $pesanan->status_pesanan_id = 5;
            $pesanan->save();

            return $this->pendingDanProses();
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
                            ->where('kategori_dapurs.nama', "Dapur Main")
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

        // return view('order.dibayar.nota-dapur', ['dapur_utama' => $dapur_utama, 'dapur_cemilan' => $dapur_cemilan, 'bar' => $bar,'order'=>$order]);
        
        $pdf = PDF::loadview('kasir-order.dibayar.nota-dapur', ['dapur_utama' => $dapur_utama, 'dapur_cemilan' => $dapur_cemilan, 'bar' => $bar,'order'=>$order]);
        $pdf->setPaper('a4', 'portrait');
        // $pdf->set_paper(array(0,0,204,1000));
        // $pdf->set_option('dpi', 72);
        // unset($pdf);
        return $pdf->stream();
    }
}
