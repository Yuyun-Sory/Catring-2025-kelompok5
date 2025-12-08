<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_order',
        'nama_pelanggan',
        'total_item',
        'total_harga',
        'status',
    ];
}
