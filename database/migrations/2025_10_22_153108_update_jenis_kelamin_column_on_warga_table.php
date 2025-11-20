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
        Schema::table('warga', function (Blueprint $table) {
            // Mengubah panjang kolom 'jenis_kelamin' menjadi 15 karakter
            $table->string('jenis_kelamin', 15)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            // Mengubah kembali, misalnya ke 10 jika itu nilai sebelumnya
            // Catatan: Pastikan nilai ini sesuai dengan definisi sebelumnya jika Anda membutuhkannya
            $table->string('jenis_kelamin', 10)->change();
        });
    }
};