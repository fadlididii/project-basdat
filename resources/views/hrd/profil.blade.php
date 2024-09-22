@extends('hrd.layouts.app')

@section('title', 'Profil HRD') 

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Menambahkan padding di atas dan bawah --}}
        <h1 class="text-center my-4">Profil Karyawan</h1>

        <div class="card shadow-lg rounded"> {{-- Memberikan shadow dan border radius --}}
            <div class="card-body">
                <h5 class="card-title">Informasi Pribadi</h5>

                <div class="form-group mb-3"> {{-- Menambahkan margin-bottom --}}
                    <label class="font-weight-bold">Nama</label> {{-- Membuat teks label lebih tebal --}}
                    <p class="form-control-static">Nama HRD</p>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Email</label>
                    <p class="form-control-static">email@contoh.com</p>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">No. Telepon</label>
                    <p class="form-control-static">081234567890</p>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Alamat</label>
                    <p class="form-control-static">Alamat HRD</p>
                </div>

                <a href="#" class="btn btn-primary float-right">Edit Profil</a> {{-- Tombol di kanan bawah --}}
            </div>
        </div>
    </div>
@endsection
