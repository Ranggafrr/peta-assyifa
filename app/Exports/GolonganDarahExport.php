<?php

namespace App\Exports;

use App\Models\GolonganDarahModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class GolonganDarahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GolonganDarahModel::select('id', 'golongan_darah', 'remark')->get();
    }

    public function headings(): array{
        return [
            'No',
            'Golongan Darah',
            'Ket',
            // Add more columns as needed
        ];   
    }
}
