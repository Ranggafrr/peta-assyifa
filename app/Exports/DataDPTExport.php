<?php

namespace App\Exports;

use App\Models\DptModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataDPTExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DptModel::select('id_dpt', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'dusun_jalan_alamat', 'rt', 'rw', 'nik', 'nomor_hp', 'remark')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Dusun/Jalan/Alamat',
            'RT',
            'RW',
            'NIK',
            'Nomor HP',
            'Ket',
            // Add more columns as needed
        ];
    }
}
