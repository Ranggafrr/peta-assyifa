<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuModel extends Model
{
    // Tentukan nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'master_menu'; // Contoh nama tabel

    // Tentukan primary key jika tidak mengikuti konvensi id
    protected $primaryKey = 'id';

    // Tentukan atribut yang bisa diisi (mass assignable)
    protected $fillable = [
        'kode_menu',
        'modul',
        'nama_menu',
        'sub_menu',
        'route',
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
    public function modul(): BelongsTo
    {
        return $this->belongsTo(ModulsModel::class, 'modul', 'modul');
    }

    public function subMenus(): HasMany
    {
        return $this->hasMany(SubMenuModel::class, 'kode_menu', 'kode_menu');
    }

    public function accessMenus(): HasMany
    {
        return $this->hasMany(AccessMenu::class, 'kode_menu', 'kode_menu');
    }
}
