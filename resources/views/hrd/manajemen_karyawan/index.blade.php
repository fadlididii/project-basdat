@extends('hrd.layouts.app')

@section('contents')
<div class="container">
    <h1>Daftar Karyawan</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('manajemenkaryawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    @if ($karyawans->isEmpty())
        <p>Tidak ada data karyawan untuk ditampilkan.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Role</th>
                        <th>Tanggal Lahir</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->id }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->alamat }}</td>
                            <td>{{ $karyawan->telepon }}</td>
                            <td>{{ $karyawan->role }}</td>
                            <td>{{ $karyawan->tanggal_lahir }}</td>
                            <td>{{ $karyawan->username }}</td>
                            <td>{{ $karyawan->password }}</td>
                            <td>
                                <a href="{{ route('manajemenkaryawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('manajemenkaryawan.destroy', $karyawan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $karyawans->links() }}
    @endif
</div>
@endsection