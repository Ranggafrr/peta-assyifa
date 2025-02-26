<?php

namespace App\Imports;

use App\Models\DataKabupatenKotaModel;
use App\Models\DataPropinsiModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class KabupatenImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $province = DataPropinsiModel::where('nama_propinsi', $row['provinsi'])->first();
            if ($province != null) {
                DataKabupatenKotaModel::firstOrCreate(
                    ['kode_kabupaten_kota' => $row['kode_kabupaten']], // Cek apakah kode_kecamatan sudah ada
                    [
                        'nama_kabupaten_kota' => $row['nama_kabupaten'],
                        'kode_propinsi' => $province['kode_propinsi'],
                        'remark' => $row['ket'],
                        'created_by' => Session::get('user')->nama_lengkap,
                        'created_at' => now(),
                    ]
                );
            }
        }
    }
    // function untuk menentukan start pada row ke berapa
    public function headingRow(): int
    {
        return 3;
    }
}
