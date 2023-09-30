<?php

namespace App\Exports;

use App\Models\PengeluaranRestoran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengeluaranRestoranExport implements FromCollection
{
    protected $tgl_dari;
    protected $tgl_sampai;
    protected $rekening;

    public function __construct($tgl_dari, $tgl_sampai, $rekening)
    {
        $this->tgl_dari = $tgl_dari;
        $this->tgl_sampai = $tgl_sampai;
        $this->rekening = $rekening;
    }

    public function headings(): array
    {
        return ['Tanggal', 'Nama Pengeluaran', 'Jumlah', 'Rekening', 'Nama Admin'];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->rekening == 'semua') {
            $data = PengeluaranRestoran::join('rekenings', 'pengeluaran_restorans.rekening_id', '=', 'rekenings.id')
                ->where('pengeluaran_restorans.tanggal', '>=', $this->tgl_dari)
                ->where('pengeluaran_restorans.tanggal', '<=', $this->tgl_sampai)
                ->orderBy('pengeluaran_restorans.tanggal', 'asc')
                ->get(['pengeluaran_restorans.tanggal', 'pengeluaran_restorans.nama', 'pengeluaran_restorans.jumlah', 'rekenings.nama', 'pengeluaran_restorans.nama_admin']);
        } else {
            $data = PengeluaranRestoran::join('rekenings', 'pengeluaran_restorans.rekening_id', '=', 'rekenings.id')
                ->where('pengeluaran_restorans.rekening_id', $this->rekening)
                ->where('pengeluaran_restorans.tanggal', '>=', $this->tgl_dari)
                ->where('pengeluaran_restorans.tanggal', '<=', $this->tgl_sampai)
                ->orderBy('pengeluaran_restorans.tanggal', 'asc')
                ->get(['pengeluaran_restorans.tanggal', 'pengeluaran_restorans.nama', 'pengeluaran_restorans.jumlah', 'rekenings.nama', 'pengeluaran_restorans.nama_admin']);
        }

        return collect([$this->headings()])->concat($data);
    }
}
