<?php

namespace App\Imports;

use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class KecamatanImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $regency = DataKabupatenKotaModel::where('nama_kabupaten_kota', $row['kabupaten'])->first();
            DataKecamatanModel::firstOrCreate(
                ['kode_kecamatan' => $row['kode_kecamatan']], // Cek apakah kode_kecamatan sudah ada
                [
                    'nama_kecamatan' => $row['nama_kecamatan'],
                    'kode_kabupaten_kota' => $regency['kode_kabupaten_kota'],
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
