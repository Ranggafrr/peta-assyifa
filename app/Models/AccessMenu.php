<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessMenu extends Model
{
    // Tentukan nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'access_menu'; // Contoh nama tabel

    // Tentukan primary key jika tidak mengikuti konvensi id
    protected $primaryKey = 'id';

    // Tentukan atribut yang bisa diisi (mass assignable)
    protected $fillable = [
        'role_id',
        'kode_menu',
        'status',
        'created_by',
        'updated_by',
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

    public function menu(): BelongsTo
    {
        return $this->belongsTo(MenuModel::class, 'kode_menu','kode_menu');
    }
}
