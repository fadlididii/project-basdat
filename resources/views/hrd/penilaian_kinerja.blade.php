@extends('hrd.layouts.app')

@section('title', 'Penilaian Kinerja Karyawan')

@section('contents')
<div class="container-fluid">
    <h1 class="text-center my-4">Form Penilaian Karyawan </h1>

    <p>Berikut adalah penilaian kinerja untuk karyawan:</p>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan Error dari Validasi Server -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk Penilaian -->
    <form method="POST" action="{{ route('hrd.storePenilaian') }}">
        @csrf
        <div class="form-group">
            <label>Nama Karyawan</label>
            <select class="form-control" id="nama_karyawan" name="id_karyawan" required>
                <option value="">Pilih Karyawan</option>
                @foreach($karyawan as $k)
                    @if($k->role === 'Karyawan')
                        <option value="{{ $k->id }}">{{ $k->nama }} (ID: {{ $k->id }})</option>
                    @endif
                @endforeach
            </select>
        </div>

        <p>Dengan hasil penilaian kinerja sebagai berikut:</p>

        <h5>I. Penilaian Hasil Kinerja :</h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th rowspan="2" style="vertical-align: middle; text-align: center;">No</th>
                    <th rowspan="2" style="vertical-align: middle; text-align: center;">Aspek Penilaian</th>
                    <th colspan="5" style="text-align: center;">Nilai</th>
                </tr>
                <tr>
                    <th style="text-align: center;">SK</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">C</th>
                    <th style="text-align: center;">B</th>
                    <th style="text-align: center;">SB</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $aspek_penilaian = [
                        'Kedisiplinan', 'Inisiatif', 'Kualitas Kerja', 'Motivasi', 'Tanggung Jawab', 
                        'Penyesuaian Diri', 'Kepemimpinan', 'Pemecahan Masalah', 'Pengambilan Keputusan', 'Kerja Sama'
                    ];
                @endphp
                @foreach ($aspek_penilaian as $index => $aspek)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $aspek }}</td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="1" required></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="2" required></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="3" required></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="4" required></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="5" required></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <small class="form-text text-muted">Keterangan: (1 = sangat kurang, 2 = kurang, 3 = cukup, 4 = baik, 5 = sangat baik)</small>

        <div class="form-group">
            <label>Komentar</label>
            <textarea class="form-control" name="komentar_hard" rows="3" placeholder="Masukkan komentar atau catatan tentang karyawan..."></textarea>
        </div>

        <div class="text-center mt-4 mb-5">
            <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
        </div>
    </form>
</div>

<!-- Tambahkan script untuk validasi client-side -->
<script>
    document.getElementById('penilaianForm').addEventListener('submit', function(event) {
        // Hitung total penilaian yang diisi
        let totalFilled = 0;

        // Periksa setiap aspek penilaian (radio buttons) untuk memastikan semuanya diisi
        @php
            foreach ($aspek_penilaian as $index => $aspek) {
                echo "if (document.querySelector('input[name=\"nilai[{$index}]\"]:checked') !== null) {
                        totalFilled++;
                      }\n";
            }
        @endphp

        // Jika total yang diisi kurang dari 10, cegah submit dan tampilkan pesan
        if (totalFilled < 10) {
            event.preventDefault(); // Cegah pengiriman form
            alert('Harap isi semua 10 aspek penilaian sebelum submit.');
        }
    });
</script>
@endsection