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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id(); // Kunci utama otomatis
            $table->string('nama', 100); // Kolom nama, tipe string, panjang 100
            $table->string('telepon', 15)->nullable(); // Kolom telepon, tipe string, panjang 15, boleh null
            $table->text('alamat')->nullable(); // Kolom alamat, tipe text, boleh null
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};