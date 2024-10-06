<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cuti', function (Blueprint $table) {
            // Menambahkan kolom 'jenis_cuti' dengan pilihan yang sudah ditentukan
            $table->enum('jenis_cuti', ['tahunan', 'sakit', 'melahirkan', 'lainnya'])->after('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuti', function (Blueprint $table) {
            $table->dropColumn('jenis_cuti');
        });
    }
};
