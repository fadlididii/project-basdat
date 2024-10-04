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
            $table->string('role'); // Role Karyawan
            $table->string('nama'); // Nama Karyawan
            $table->text('alamat'); // Alamat Karyawan
            $table->string('telepon'); // Nomor Telepon Karyawan
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
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
