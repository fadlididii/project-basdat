@extends('hrd.layouts.app')

@section('title', 'Penilaian Kinerja Karyawan')

@section('contents')
<div class="container-fluid">
    <h1 class="text-center my-4">Form Penilaian Karyawan </h1>

    <p>Berikut adalah penilaian kinerja untuk karyawan:</p>

    <form method="POST">
        @csrf
        <div class="form-group position-relative">
            <label>Nama</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama" required autocomplete="off">
            <div id="namaList" class="dropdown-menu" style="display:none; position:absolute; width:100%;"></div>
        </div>
        <div class="form-group">
            <label>ID Karyawan</label>
            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" readonly>
        </div>
        <div class="form-group">
            <label>Posisi</label>
            <input type="text" class="form-control" name="posisi" required>
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
                    <th style="text-align: center;">B</th>
                    <th style="text-align: center;">SB</th>
                    <th style="text-align: center;">C</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">SK</th>
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
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="1"></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="2"></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="3"></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="4"></td>
                        <td class="text-center"><input type="radio" name="nilai[{{ $index }}]" value="5"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <small class="form-text text-muted">Keterangan: (1 = sangat buruk, 2 = buruk, 3 = cukup, 4 = baik, 5 = sangat baik)</small>

        <h5 class="mt-4">II. Catatan Absensi :</h5>
        <div class="form-group">
            <label>Jumlah Absensi:</label>
            <ul>
                <li>Alpha: <input type="number" name="alpha" min="0" class="form-control d-inline-block w-auto" required></li>
                <li>Izin: <input type="number" name="izin" min="0" class="form-control d-inline-block w-auto" required></li>
                <li>Sakit: <input type="number" name="sakit" min="0" class="form-control d-inline-block w-auto" required></li>
            </ul>
        </div>

        <div class="form-group">
            <label>Komentar</label>
            <textarea class="form-control" name="komentar_hard" rows="3" placeholder="Masukkan komentar atau catatan tentang karyawan..."></textarea>
        </div>

        <div class="text-center mt-4 mb-5">
    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</div>
    </form>
</div>
@endsection