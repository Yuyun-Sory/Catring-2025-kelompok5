<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';

    protected $fillable = [
        'id_jadwal_produksi',
        'id_bahan',
        'jumlah',
        'satuan'
    ];

   public function jadwal()
{
    return $this->belongsTo(JadwalProduksi::class, 'id_jadwal_produksi');
}



    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
}
