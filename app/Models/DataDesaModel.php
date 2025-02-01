<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDesaModel extends Model
{
  protected $table = 'master_desa';
  protected $primaryKey = 'id';

  protected $fillable = [
      'kode_desa',
      'nama_desa',
      'kode_kecamatan',
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
