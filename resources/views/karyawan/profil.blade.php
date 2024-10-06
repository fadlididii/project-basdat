@extends('karyawan.layouts.app')

@section('title', 'Profil Karyawan')

@section('contents')
    <div class="container py-4">
        <h1 class="text-center my-4">Profil Karyawan</h1>

        @if(isset($nama))
            <div class="card shadow-lg rounded">
                <div class="card-body">

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nama</label>
                        <p class="form-control-static">{{ $nama }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">No. Telepon</label>
                        <p class="form-control-static">{{ $telepon }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Alamat</label>
                        <p class="form-control-static">{{ $alamat }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                        <p class="form-control-static">{{ $tanggal_lahir }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Jabatan</label>
                        <p class="form-control-static">{{ $role }}</p>
                    </div>
                </div>
            </div>
        @else
            <p>Data profil karyawan tidak ditemukan.</p>
        @endif
    </div>
@endsection
