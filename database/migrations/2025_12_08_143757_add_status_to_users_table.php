<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Tambah kolom phone jika belum ada
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('password');
            }

            // Tambah kolom role jika belum ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('Admin')->after('phone');
            }

            // Tambah kolom status jika belum ada
            if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->default('Aktif')->after('role');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }

            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }

            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
