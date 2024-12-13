<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalNilaiToPenilaianTable extends Migration
{
    public function up()
    {
        Schema::table('penilaian', function (Blueprint $table) {
            $table->unsignedInteger('total_nilai')->nullable()->after('penilaian');
        });
    }

    public function down()
    {
        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropColumn('total_nilai');
        });
    }
}
