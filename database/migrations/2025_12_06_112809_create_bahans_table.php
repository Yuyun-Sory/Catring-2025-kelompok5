<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori');
            $table->integer('stok_saat_ini')->default(0);
            $table->string('satuan', 50);
            $table->integer('minimal_stok')->default(0); // Kolom penentu status
            $table->decimal('harga_satuan', 10, 0)->default(0); // Menggunakan decimal untuk harga
            $table->string('lokasi')->nullable();
            
            // Kolom 'status' TIDAK ADA karena dihitung via Model Accessor
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahans');
    }
};