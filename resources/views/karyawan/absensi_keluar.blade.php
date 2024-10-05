@extends('karyawan.layouts.app')

@section('contents')
<div class="container">
    <h2>Absensi Jam Keluar</h2>

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

    <form action="{{ route('karyawan.absensi.storeJamKeluar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jam_keluar">Jam Keluar:</label>
            <input type="time" name="jam_keluar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Absensi Jam Keluar</button>
    </form>
</div>
@endsection
