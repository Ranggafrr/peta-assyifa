<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DptModel extends Model
{

    protected $table = 'data_dpt';
    protected $primaryKey = 'id_dpt';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
<<<<<<< HEAD
        'tanggal_lahir',
=======
        'usia',
>>>>>>> a984a0b (fix import data)
        'dusun_jalan_alamat',
        'rt',
        'rw',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten',
        'propinsi',
        'tps',
        'nik',
        'nomor_hp',
        'remark',
        'created_by',
        'created_at',
        'update_by',
        'update_at'
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
