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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id(); // ID Karyawan (primary key, auto-increment)
            $table->string('nama'); // Nama Karyawan
            $table->text('alamat'); // Alamat Karyawan
            $table->string('telepon'); // Nomor Telepon Karyawan
            $table->string('role'); // Role Karyawan
            $table->date('tanggal_lahir');
            $table->string('username');// Kolom created_at dan updated_at otomatis
            $table->string('password'); // Password Karyawan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
