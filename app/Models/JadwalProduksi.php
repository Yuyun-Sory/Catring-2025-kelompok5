<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalProduksi extends Model
{
    protected $table = 'jadwal_produksi';

    protected $fillable = [
        'tanggal_produksi',
        'jam_produksi',
        'nama_pelanggan',
        'id_menu',
        'jumlah_porsi',
        'status_bahan'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'id_jadwal_produksi');
    }
}
