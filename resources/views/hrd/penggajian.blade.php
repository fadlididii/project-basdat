@extends('hrd.layouts.app')

@section('title', 'Penggajian Karyawan')

@section('contents')
<div class="container-fluid">
    <h1 class="text-center my-4">Penggajian Karyawan</h1>

    <!-- Tabel Penggajian Karyawan -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penggajian Karyawan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Nama</th>
                            <th>Gaji Pokok</th>
                            <th>Gaji Bonus</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>John Doe</td>
                            <td>Rp 5.000.000</td>
                            <td>Rp 500.000</td>
                            <td>Rp 5.500.000</td>
                            <td><button class="btn btn-primary btn-sm">Kirim Informasi Gaji</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
