@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Informasi Penilaian Kerja') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Informasi Penilaian Kerja</h1> {{-- Mengatur heading ke tengah --}}

        <div class="row justify-content-center"> {{-- Membuat konten responsif dan berada di tengah --}}
            <div class="col-md-10"> {{-- Mengatur lebar agar sesuai di layar yang lebih kecil --}}
                <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                    <h5 class="card-title">Rincian Penilaian Kerja</h5>

                    {{-- Cek apakah data penilaian tersedia --}}
                    @if ($penilaian)
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
                                    $nilai = json_decode($penilaian->penilaian, true) ?? [];
                                @endphp
                                
                                {{-- Cek jika nilai tersedia --}}
                                @foreach ($aspek_penilaian as $index => $aspek)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $aspek }}</td>
                                        @for($i = 1; $i <= 5; $i++)
                                            <td>
                                                <input type="checkbox" disabled 
                                                    {{-- Cek apakah nilai ada dan sesuai --}}
                                                    {{ isset($nilai[$index]) && $nilai[$index] == $i ? 'checked' : '' }}>
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Bagian untuk komentar --}}
                        <div class="form-group mt-4">
                            <label for="komentar" class="font-weight-bold">Komentar:</label>
                            <p class="form-control-static">{{ $penilaian->komentar_hard ?? 'Tidak ada komentar.' }}</p>
                        </div>

                    @else
                        <div class="alert alert-info text-center">
                            Belum ada data penilaian yang tersedia.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
