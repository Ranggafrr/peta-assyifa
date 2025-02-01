<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKecamatanModel extends Model
{
  protected $table = 'master_kecamatan';
  protected $primaryKey = 'id';

  protected $fillable = [
      'kode_kecamatan',
      'nama_kecamatan',
      'kode_kabupaten_kota',
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
