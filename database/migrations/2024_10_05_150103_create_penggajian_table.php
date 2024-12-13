<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajianTable extends Migration
{
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_karyawan'); // ID karyawan
            $table->dateTime('bulan'); // Bulan dengan tipe datetime
            $table->decimal('gaji_pokok', 15, 2); // Gaji pokok
            $table->decimal('gaji_bonus', 15, 2)->default(0); // Bonus
            $table->decimal('total_gaji', 15, 2); // Total gaji
            $table->boolean('gaji_dikirim')->default(false); // Status pengiriman gaji
            $table->timestamps();

            // Relasi ke tabel karyawan
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penggajian');
    }
}
