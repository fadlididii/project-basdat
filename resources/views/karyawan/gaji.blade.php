@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Informasi Gaji') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Informasi Gaji Karyawan</h1> {{-- Mengatur heading ke tengah --}}
        
        @if(isset($error))
            <div class="alert alert-danger text-center">{{ $error }}</div> {{-- Tampilkan error jika tidak ada data --}}
        @else
            <div class="row justify-content-center"> {{-- Membuat konten responsif dan berada di tengah --}}
                <div class="col-md-8"> {{-- Mengatur lebar agar sesuai di layar yang lebih kecil --}}
                    <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                        <h5 class="card-title">Rincian Gaji Bulan {{ $bulan }}</h5> {{-- Menampilkan bulan gaji --}}
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
                                    <td>Rp {{ number_format($gaji_pokok, 0, ',', '.') }}</td> {{-- Data dinamis untuk gaji pokok --}}
                                </tr>
                                <tr>
                                    <td>Bonus</td>
                                    <td>Rp {{ number_format($gaji_bonus, 0, ',', '.') }}</td> {{-- Data dinamis untuk bonus --}}
                                </tr>
                                <tr>
                                    <td><strong>Total Gaji Bersih</strong></td>
                                    <td><strong>Rp {{ number_format($total_gaji, 0, ',', '.') }}</strong></td> {{-- Data dinamis untuk total gaji --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
