<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
     protected $primaryKey = 'id_menu';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_menu',
        'harga',
        'foto',
        'kategori',
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'id_menu');
    }

//     public function menu()
// {
//     return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
// }

 public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_menu', 'id_menu');
    }

}
