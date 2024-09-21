@extends('hrd.layouts.app')

@section('title', 'Manajemen Karyawan')

@section('contents')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manajemen Karyawan</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <input type="text" class="form-control" placeholder="Search for...">
                </div>
            </div>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
                Tambah Karyawan Baru
            </button>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Karyawan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelKaryawan">
                        <!-- Data karyawan dummy -->
                        <tr>
                            <td>001</td>
                            <td>John Doe</td>
                            <td>Jl. Merpati No. 10, Jakarta</td>
                            <td>08123456789</td>
                            <td>Manager</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Jane Smith</td>
                            <td>Jl. Kutilang No. 12, Bandung</td>
                            <td>08198765432</td>
                            <td>HRD</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Ahmad Hidayat</td>
                            <td>Jl. Anggrek No. 15, Surabaya</td>
                            <td>08134567890</td>
                            <td>Staff IT</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Modal untuk menambah/mengedit karyawan -->
<div class="modal fade" id="modalKaryawan" tabindex="-1" aria-labelledby="labelModalKaryawan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelModalKaryawan">Tambah Karyawan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="idKaryawan" class="form-label">ID Karyawan</label>
                        <input type="text" class="form-control" id="idKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="namaKaryawan" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="namaKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="alamatKaryawan" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamatKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="teleponKaryawan" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="teleponKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="jabatanKaryawan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatanKaryawan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
