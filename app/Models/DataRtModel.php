<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataRtModel extends Model
{
  protected $table = 'master_rt';
  protected $primaryKey = 'id';

  protected $fillable = [
      'kode_rt',
      'nama_rt',
      'kode_rw',
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
