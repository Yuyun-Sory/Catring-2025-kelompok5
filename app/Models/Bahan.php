<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; // Untuk Laravel 9/10+

class Bahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'kategori', 'stok_saat_ini', 'satuan', 'minimal_stok', 'harga_satuan', 'lokasi'
    ];
    
    // Kita tidak perlu kolom 'status' di database, karena kita hitung secara dinamis
    protected $appends = ['status']; 

    /**
     * Accessor untuk mendapatkan status (Aman/Menipis) secara dinamis.
     * Ini yang memungkinkan $bahan->status bekerja di Blade.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => 
                (int)$attributes['stok_saat_ini'] < (int)$attributes['minimal_stok'] ? 'Menipis' : 'Aman',
        );
    }
}