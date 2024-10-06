<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuti1Table extends Migration
{
    public function up()
    {
        Schema::create('cuti1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_karyawan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('jenis_cuti');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}
