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
        Schema::create('jenis_karyawan', function (Blueprint $table) {
            $table->id(); // ID Jenis Karyawan
            $table->enum('nama_jenis', ['Tetap', 'Magang'])->unique(); // Nama jenis karyawan, contoh: Tetap, Magang
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_karyawan');
    }
};
