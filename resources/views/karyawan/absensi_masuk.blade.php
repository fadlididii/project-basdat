@extends('karyawan.layouts.app')

@section('contents')
<div class="container">
    <h2>Absensi Jam Masuk</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('karyawan.absensi.storeJamMasuk') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jam_masuk">Jam Masuk:</label>
            <input type="time" name="jam_masuk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_absensi">Tanggal Absensi:</label>
            <input type="date" name="tanggal_absensi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status_absensi">Status Absensi:</label>
            <select name="status_absensi" class="form-control">
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Absensi Jam Masuk</button>
    </form>
</div>
@endsection
