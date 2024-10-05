@extends('hrd.layouts.app')

@section('contents')
<div class="container">
    <h2>Daftar Absensi Karyawan</h2>

    <!-- Tabel Absensi -->
    <table id="absensiTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status Absensi</th>
                <th>Tanggal Absensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $item)
            <tr>
                <td>{{ $item->nama_karyawan }}</td>
                <td>{{ $item->jam_masuk }}</td>
                <td>{{ $item->jam_keluar ?? 'Belum Keluar' }}</td>
                <td>{{ $item->status_absensi }}</td>
                <td>{{ $item->tanggal_absensi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#absensiTable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true
        });
    });
</script>

@endsection
