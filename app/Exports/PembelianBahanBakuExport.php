<?php

namespace App\Exports;

use App\Models\PembelianBahanBaku;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembelianBahanBakuExport implements FromCollection
{
    protected $tgl_dari;
    protected $tgl_sampai;
    protected $bahan_baku;

    public function __construct($tgl_dari, $tgl_sampai, $bahan_baku)
    {
        $this->tgl_dari = $tgl_dari;
        $this->tgl_sampai = $tgl_sampai;
        $this->bahan_baku = $bahan_baku;
    }

    public function headings(): array
    {
        return ['Nama Bahan Baku', 'Tanggal', 'Jumlah', 'Nama Staff Gudang'];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->bahan_baku == 'semua') {
            $data = PembelianBahanBaku::join('bahan_bakus', 'pembelian_bahan_bakus.bahan_baku_id', '=', 'bahan_bakus.id')
                ->where('pembelian_bahan_bakus.tanggal', '>=', $this->tgl_dari)
                ->where('pembelian_bahan_bakus.tanggal', '<=', $this->tgl_sampai)
                ->orderBy('pembelian_bahan_bakus.tanggal', 'asc')
                ->get(['bahan_bakus.nama', 'pembelian_bahan_bakus.tanggal', 'pembelian_bahan_bakus.jumlah', 'pembelian_bahan_bakus.nama_staff_gudang']);
        } else {
            $data = PembelianBahanBaku::join('bahan_bakus', 'pembelian_bahan_bakus.bahan_baku_id', '=', 'bahan_bakus.id')
                ->where('pembelian_bahan_bakus.bahan_baku_id', $this->bahan_baku)
                ->where('pembelian_bahan_bakus.tanggal', '>=', $this->tgl_dari)
                ->where('pembelian_bahan_bakus.tanggal', '<=', $this->tgl_sampai)
                ->orderBy('pembelian_bahan_bakus.tanggal', 'asc')
                ->get(['bahan_bakus.nama', 'pembelian_bahan_bakus.tanggal', 'pembelian_bahan_bakus.jumlah', 'pembelian_bahan_bakus.nama_staff_gudang']);
        }

        return collect([$this->headings()])->concat($data);
    }
}
