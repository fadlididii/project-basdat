@extends('hrd.layouts.app')

@section('title', 'Penilaian Kinerja Karyawan')

@section('contents')
<div class="container-fluid">
    <h1 class="text-center my-4">Form Penilaian Karyawan </h1>

    <p>Berikut adalah penilaian kinerja untuk karyawan:</p>

    <!-- Tampilkan pesan sukses -->
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
    <form method="POST" action="{{ route('hrd.storePenilaian') }}" id="penilaianForm">
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
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Aspek Penilaian</th>
                    <th colspan="5" class="text-center">Nilai</th>
                </tr>
                <tr>
                    <th class="text-center">SK</th>
                    <th class="text-center">K</th>
                    <th class="text-center">C</th>
                    <th class="text-center">B</th>
                    <th class="text-center">SB</th>
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

        <!-- Total nilai yang dihitung secara dinamis -->
        <div class="form-group">
            <label>Total Nilai</label>
            <input type="text" class="form-control" id="total_nilai" readonly>
        </div>

        <div class="text-center mt-4 mb-5">
            <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
        </div>
    </form>
</div>

<!-- Script untuk validasi client-side dan perhitungan total nilai -->
<script>
    document.getElementById('penilaianForm').addEventListener('submit', function(event) {
        const totalFilled = document.querySelectorAll('input[type="radio"]:checked').length;
        if (totalFilled < 10) {
            event.preventDefault();
            alert('Harap isi semua 10 aspek penilaian sebelum submit.');
        }
    });

    // Hitung total nilai secara dinamis
    const radios = document.querySelectorAll('input[type="radio"]');
    const totalNilaiField = document.getElementById('total_nilai');

    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            const selectedValues = Array.from(document.querySelectorAll('input[type="radio"]:checked')).map(input => parseInt(input.value));
            const totalNilai = selectedValues.reduce((acc, val) => acc + val, 0);
            totalNilaiField.value = totalNilai;
        });
    });
</script>
@endsection
