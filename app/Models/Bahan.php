<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Bahan extends Model
{
    protected $table = 'bahans';

    protected $fillable = [
        'nama',
        'kategori',
        'stok_saat_ini',
        'satuan',
        'minimal_stok',
        'harga_satuan',
        'lokasi'
    ];

    protected $appends = ['status'];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn () =>
                $this->stok_saat_ini < $this->minimal_stok
                    ? 'Menipis'
                    : 'Aman'
        );
    }

    public function produksis()
    {
        return $this->hasMany(Produksi::class, 'bahan_id');
    }
}
