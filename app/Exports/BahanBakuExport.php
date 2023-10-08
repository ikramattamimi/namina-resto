<?php

namespace App\Exports;

use App\Models\BahanBaku;
use Maatwebsite\Excel\Concerns\FromCollection;

class BahanBakuExport implements FromCollection
{
    public function headings(): array
    {
        return ['Nama', 'Deskripsi', 'Harga Beli', 'Stok', 'Minimal Stok', 'Satuan'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = BahanBaku::where('is_active', true)->get(['nama', 'deskripsi', 'harga_beli', 'stok', 'minimal_stok', 'satuan']);

        return collect([$this->headings()])->concat($data);
    }
}
