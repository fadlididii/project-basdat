@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Informasi Penilaian Kerja') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Informasi Penilaian Kerja</h1> {{-- Mengatur heading ke tengah --}}

        <div class="row justify-content-center"> {{-- Membuat konten responsif dan berada di tengah --}}
            <div class="col-md-10"> {{-- Mengatur lebar agar sesuai di layar yang lebih kecil --}}
                <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                    <h5 class="card-title">Rincian Penilaian Kerja</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Aspek Penilaian</th>
                                <th scope="col">SK</th>
                                <th scope="col">K</th>
                                <th scope="col">C</th>
                                <th scope="col">B</th>
                                <th scope="col">SB</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Looping melalui aspek penilaian --}}
                            @php
                                $aspek_penilaian = [
                                    'Kedisiplinan', 'Inisiatif', 'Kualitas Kerja', 'Motivasi', 
                                    'Tanggung Jawab', 'Penyesuaian Diri', 'Kepemimpinan', 
                                    'Pemecahan Masalah', 'Pengambilan Keputusan', 'Kerja Sama'
                                ];
                            @endphp
                            @foreach ($aspek_penilaian as $index => $aspek)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $aspek }}</td>
                                    <td><input type="checkbox" disabled></td>
                                    <td><input type="checkbox" disabled></td>
                                    <td><input type="checkbox" disabled></td>
                                    <td><input type="checkbox" disabled></td>
                                    <td><input type="checkbox" disabled></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Bagian untuk komentar --}}
                    <div class="form-group mt-4">
                        <label for="komentar" class="font-weight-bold">Komentar:</label>
                        <p class="form-control-static">Penilaian telah dilakukan berdasarkan kriteria yang ada. Beberapa aspek menunjukkan performa baik, namun ada ruang untuk perbaikan.</p>
                    </div>

                    {{-- Bagian Rekap Absensi --}}
                    <h5 class="mt-4">Rekapan Absensi :</h5>
                    <ul>
                        <li>Alpha: <span>2 hari</span></li>
                        <li>Izin: <span>1 hari</span></li>
                        <li>Sakit: <span>3 hari</span></li>
                    </ul>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Download Laporan Penilaian</a> {{-- Tombol untuk download laporan --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
