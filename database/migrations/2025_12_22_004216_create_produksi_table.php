<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produksi', function (Blueprint $table) {
    $table->id();

    $table->foreignId('id_jadwal_produksi')
          ->constrained('jadwal_produksi')
          ->cascadeOnDelete();

    $table->foreignId('id_bahan')
          ->constrained('bahans')
          ->cascadeOnDelete();

    $table->integer('jumlah');
    $table->string('satuan', 20);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
