<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanModel extends Model
{
    protected $table = 'data_pendidikan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pendidikan',
        'tingkat_pendidikan',
        'akreditasi',
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
