<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajianTable extends Migration
{
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            if (!Schema::hasTable('penggajian')) {
                $table->id();
                $table->unsignedBigInteger('id_karyawan');
                $table->string('bulan');
                $table->decimal('gaji_pokok', 15, 2);
                $table->decimal('gaji_bonus', 15, 2)->default(0);
                $table->decimal('total_gaji', 15, 2);
                $table->boolean('gaji_dikirim')->default(false);
                $table->timestamps();
            
                $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            }
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('penggajian');
    }
}

