@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Absensi') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Silahkan Mengisi Absensi</h1> {{-- Mengatur heading ke tengah --}}

        <div class="row justify-content-center"> {{-- Membuat form responsif dan berada di tengah --}}
            <div class="col-md-6"> {{-- Mengatur lebar form agar sesuai di layar yang lebih kecil --}}
                <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                    <form>
                        <div class="form-group mb-3">
                            <label for="tanggal" class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jam_masuk" class="font-weight-bold">Jam Masuk</label>
                            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jam_keluar" class="font-weight-bold">Jam Keluar</label>
                            <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Kirim Absensi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection