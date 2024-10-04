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

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select select2" id="role" name="role" required>
                <option value="" disabled>Pilih Role</option>
                <option value="HRD" {{ $karyawan->role == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Karyawan" {{ $karyawan->role == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $karyawan->tanggal_lahir }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" value="{{ $karyawan->username }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
            <small>Leave blank if you don't want to change the password.</small>
        </div>

        <button type="submit" class="btn btn-success">Update Karyawan</button>
        <a href="{{ route('manajemenkaryawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Role",
            allowClear: true
        });
    });
</script>
@endsection
