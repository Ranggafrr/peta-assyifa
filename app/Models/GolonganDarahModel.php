<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolonganDarahModel extends Model
{
    protected $table = 'master_golongan_darah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'golongan_darah',
        'remark',
        'created_by',
        'created_at',
        'updated_by',
        'update_at',
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
