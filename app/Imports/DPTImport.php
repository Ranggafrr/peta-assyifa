<?php

namespace App\Imports;

use App\Models\DataDesaModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataPropinsiModel;
use App\Models\DataKecamatanModel;
use App\Models\DptModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class DPTImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $provence = DataPropinsiModel::where('nama_propinsi', $row['provinsi'])->first();
            $regency = DataKabupatenKotaModel::where('nama_kabupaten_kota', $row['kabupaten'])->first();
            $district = DataKecamatanModel::where('nama_kecamatan', $row['kecamatan'])->first();
            $village = DataDesaModel::where('nama_desa', $row['desakelurahan'])->first();
            DptModel::create([
                'nama'              => $row['nama'],
                'jenis_kelamin'     => $row['jenis_kelamin'],
                'usia'              => $row['usia'],
                'dusun_jalan_alamat' => $row['dusunalamat'],
                'rt'                => $row['rt'],
                'rw'                => $row['rw'],
                'remark'          => $row['ket'],
                'propinsi'         => $provence['kode_propinsi'],
                'kecamatan'         => $district['kode_kecamatan'],
                'kabupaten'         => $regency['kode_kabupaten_kota'],
                'desa_kelurahan'    => $village['kode_desa'],
                'tps'               => $row['tps'],
                'created_by' => Session::get('user')->nama_lengkap,
                'created_at' => now(),
            ]);
        }
    }

    // function untuk menentukan start pada row ke berapa
    public function headingRow(): int
    {
        return 10;
    }
}
