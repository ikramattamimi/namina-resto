<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelangganExport implements FromCollection
{

    public function headings(): array
    {
        return ['Nama', 'No HP', 'Alamat'];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Pelanggan::get(['nama', 'no_hp', 'alamat']);
        return collect([$this->headings()])->concat($data);
    }
}
