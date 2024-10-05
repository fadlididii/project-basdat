@extends('hrd.layouts.app') <!-- Meng-extend template utama HRD -->

@section('title', 'Daftar Absensi Karyawan')

@section('contents')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Absensi Karyawan</h1>

    <!-- Tabel Absensi -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Status Absensi</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                    <th scope="col">Foto Masuk</th>
                    <th scope="col">Foto Keluar</th>
                    <th scope="col">Tanggal Absensi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absensi as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->karyawan->nama }}</td> <!-- Nama karyawan dari relasi -->
                        <td>{{ $data->status_absensi }}</td>
                        <td>{{ $data->jam_masuk }}</td>
                        <td>{{ $data->jam_keluar ?? 'Belum Absen Keluar' }}</td>
                        <td>
                            @if ($data->foto_absensi)
                                <img src="{{ asset('storage/' . $data->foto_absensi) }}" alt="Foto Masuk" width="100">
                            @else
                                Tidak Ada Foto Masuk
                            @endif
                        </td>
                        <td>
                            @if ($data->foto_keluar)
                                <img src="{{ asset('storage/' . $data->foto_keluar) }}" alt="Foto Keluar" width="100">
                            @else
                                Belum Ada Foto Keluar
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data absensi tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
