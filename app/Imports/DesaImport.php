<?php

namespace App\Imports;

use App\Models\DataDesaModel;
use App\Models\DataKecamatanModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class DesaImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $district = DataKecamatanModel::where('nama_kecamatan', $row['kecamatan'])->first();
            if ($district != null) {
                DataDesaModel::firstOrCreate(
                    ['kode_desa' => $row['kode_desa']], // Cek apakah kode_kecamatan sudah ada
                    [
                        'nama_desa' => $row['nama_desa'],
                        'kode_kecamatan' => $district['kode_kecamatan'],
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
