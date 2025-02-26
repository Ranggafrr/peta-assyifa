<?php

namespace App\Imports;

use App\Models\DataPropinsiModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class ProvinsiImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            DataPropinsiModel::firstOrCreate(
                ['kode_propinsi' => $row['kode_provinsi']], // Cek apakah data sudah ada
                [
                    'nama_propinsi' => $row['nama_provinsi'],
                    'remark' => $row['ket'],
                    'created_by' => Session::get('user')->nama_lengkap,
                    'created_at' => now(),
                ]
            );
        }
    }
    // function untuk menentukan start pada row ke berapa
    public function headingRow(): int
    {
        return 3;
    }
}
