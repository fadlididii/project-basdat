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
                                <th scope="col">B</th>
                                <th scope="col">SB</th>
                                <th scope="col">C</th>
                                <th scope="col">K</th>
                                <th scope="col">SK</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Contoh data yang sudah dinilai oleh HRD --}}
                            <tr>
                                <td>1</td>
                                <td>Kedisiplinan</td>
                                <td><input type="checkbox" checked disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Inisiatif</td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" checked disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kualitas Kerja</td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" checked disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Motivasi</td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" checked disabled></td>
                                <td><input type="checkbox" disabled></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Tanggung Jawab</td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" disabled></td>
                                <td><input type="checkbox" checked disabled></td>
                            </tr>
                            {{-- Tambahkan aspek penilaian lain di sini --}}
                        </tbody>
                    </table>

                    <div class="form-group mt-4">
                        <label for="komentar" class="font-weight-bold">Komentar:</label>
                        <p class="form-control-static">Penilaian telah dilakukan berdasarkan kriteria yang ada, hasil menunjukkan performa cukup baik, tetapi ada beberapa area yang memerlukan perbaikan.</p>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Download Laporan Penilaian</a> {{-- Tombol untuk download laporan --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
