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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian'); // Primary key untuk tabel penilaian
            $table->unsignedBigInteger('id_karyawan'); // Foreign key untuk id_karyawan
            $table->integer('skor'); // Kolom untuk skor penilaian
            $table->text('catatan')->nullable(); // Kolom catatan, bisa bernilai null
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
            
            // Definisikan foreign key (FK) ke tabel karyawan
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
