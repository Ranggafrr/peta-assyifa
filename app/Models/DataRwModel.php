<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRwModel extends Model
{
  protected $table = 'master_rw';
  protected $primaryKey = 'id';

  protected $fillable = [
      'kode_rw',
      'nama_rw',
      'kode_desa',
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
