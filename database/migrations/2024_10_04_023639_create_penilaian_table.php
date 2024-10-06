<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_karyawan');
            $table->json('penilaian'); // Menyimpan penilaian sebagai JSON
            $table->text('komentar_hard')->nullable();
            $table->date('tanggal_penilaian');
            $table->timestamps();

            // Foreign key ke tabel manajemen_karyawan
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
