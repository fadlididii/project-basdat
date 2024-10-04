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
        Schema::create('cuti', function (Blueprint $table) {
            $table->id('id_cuti'); // Primary key untuk tabel cuti
            $table->unsignedBigInteger('id_karyawan'); // Foreign key untuk id_karyawan
            $table->date('tanggal_mulai'); // Kolom untuk tanggal mulai cuti
            $table->date('tanggal_selesai'); // Kolom untuk tanggal selesai cuti
            $table->text('alasan'); // Kolom untuk alasan pengajuan cuti
            $table->boolean('persetujuan')->default(false); // Kolom untuk status persetujuan, default false (belum disetujui)
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
        Schema::dropIfExists('cuti');
    }
};
