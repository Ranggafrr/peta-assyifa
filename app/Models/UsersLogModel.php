<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLogModel extends Model
{
    // Tentukan nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'user_log'; // Contoh nama tabel

    // Tentukan primary key jika tidak mengikuti konvensi id
    protected $primaryKey = 'id';

    // Tentukan atribut yang bisa diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'action',
        'status',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];

    // Tentukan apakah atribut timestamps otomatis diatur oleh Eloquent
    public $timestamps = true;

    // Jika kamu tidak ingin menggunakan created_at dan updated_at
    // public $timestamps = false;

    // Jika ingin memperlakukan atribut sebagai tanggal
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
