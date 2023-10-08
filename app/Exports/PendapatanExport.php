<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendapatanExport implements FromCollection
{
    protected $tgl_dari;
    protected $tgl_sampai;

    public function __construct($tgl_dari, $tgl_sampai)
    {
        $this->tgl_dari = $tgl_dari;
        $this->tgl_sampai = $tgl_sampai;
    }

    public function headings(): array
    {
        return ['Tanggal', 'Jumlah'];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('pesanans')
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_bayar) as total_pendapatan'))
            ->where('created_at', '>=', $this->tgl_dari)
            ->where('created_at', '<=', $this->tgl_sampai)
            ->whereNotIn('status_pesanan_id', [1, 4])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal')
            ->get();

        return collect([$this->headings()])->concat($data);
    }
}
