<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'no_order',
        'id_menu',
        'nama_pelanggan',
        'total_item',
        'total_harga',
        'status',
<<<<<<< HEAD
        'tanggal_produksi',
=======
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
        'status_order',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'id'); 
    }
}
