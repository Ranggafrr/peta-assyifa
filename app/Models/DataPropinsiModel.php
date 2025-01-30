<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPropinsiModel extends Model
{
    protected $table = 'master_propinsi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_propinsi',
        'nama_propinsi',
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
