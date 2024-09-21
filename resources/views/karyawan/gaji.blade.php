@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Informasi Gaji') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Informasi Gaji Karyawan</h1> {{-- Mengatur heading ke tengah --}}

        <div class="row justify-content-center"> {{-- Membuat konten responsif dan berada di tengah --}}
            <div class="col-md-8"> {{-- Mengatur lebar agar sesuai di layar yang lebih kecil --}}
                <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                    <h5 class="card-title">Rincian Gaji</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Komponen Gaji</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gaji Pokok</td>
                                <td>Rp 5.000.000</td>
                            </tr>
                            <tr>
                                <td>Bonus</td>
                                <td>Rp 500.000</td>
                            </tr>
                           
                                <td><strong>Total Gaji Bersih</strong></td>
                                <td><strong>Rp 5.500.000</strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Download Slip Gaji</a> {{-- Tombol untuk download slip gaji --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
