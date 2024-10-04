@extends('hrd.layouts.app')

@section('contents')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('manajemenkaryawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="{{ $karyawan->alamat }}" required>
        </div>

        <div class="form-group">
            <label for="telepon">Nomor Telepon:</label>
            <input type="text" name="telepon" class="form-control" value="{{ $karyawan->telepon }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <input type="text" name="role" class="form-control" value="{{ $karyawan->role }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Karyawan</button>
        <a href="{{ route('manajemenkaryawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection