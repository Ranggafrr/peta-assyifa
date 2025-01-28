<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PekerjaanModel extends Model
{
    protected $table = 'data_pekerjaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pekerjaan',
        'status_pekerjaan',
        'tingkat_pendidikan',
        'remark',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
