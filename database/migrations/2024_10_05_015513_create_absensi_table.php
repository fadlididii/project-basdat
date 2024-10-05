<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_karyawan');
            $table->string('status_absensi');
            $table->string('foto_absensi')->nullable(); // Foto jam masuk
            $table->string('foto_keluar')->nullable(); // Foto jam keluar
            $table->timestamp('jam_masuk')->nullable();
            $table->timestamp('jam_keluar')->nullable();
            $table->timestamps();
        
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
