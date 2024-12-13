<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PenilaianKinerja;

class UpdatePenilaianToInteger extends Command
{
    protected $signature = 'penilaian:convert-to-integer';
    protected $description = 'Mengubah nilai JSON string pada penilaian menjadi integer';
    


    public function handle()
    {
        $penilaianRecords = PenilaianKinerja::all();

        foreach ($penilaianRecords as $record) {
            $penilaianArray = json_decode($record->penilaian, true);

            // Konversi elemen array menjadi integer
            $penilaianArray = array_map('intval', $penilaianArray);

            // Simpan kembali dalam format JSON
            $record->penilaian = json_encode($penilaianArray);
            $record->save();
        }

        $this->info('Semua data penilaian berhasil diperbarui menjadi integer.');
    }
}
