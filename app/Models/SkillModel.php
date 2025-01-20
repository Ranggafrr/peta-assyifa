<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillModel extends Model
{
    protected $table = 'master_skill';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_skill',
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
