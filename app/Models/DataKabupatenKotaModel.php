<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKabupatenKotaModel extends Model
{
  protected $table = 'master_kabupaten_kota';
  protected $primaryKey = 'id';

  protected $fillable = [
      'kode_kabupaten_kota',
      'nama_kabupaten_kota',
      'kode_propinsi',
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
