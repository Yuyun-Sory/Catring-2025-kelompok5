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
        Schema::create('jadwal_produksi', function (Blueprint $table) {
           $table->id();

            $table->date('tanggal_produksi');
            $table->time('jam_produksi');

            $table->string('nama_pelanggan');

             $table->unsignedBigInteger('id_menu');

            $table->integer('jumlah_porsi');

            $table->enum('status_bahan', ['lengkap', 'belum lengkap'])
                ->default('belum lengkap');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_produksi');
    }
};
