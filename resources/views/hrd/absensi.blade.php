@extends('hrd.layouts.app')

@section('title', ' Absensi')

@section('contents')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"> Absensi</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Karyawan...">
                    <select id="filterStatus" class="form-control ms-2">
                        <option value="">Semua Status</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="absensiTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Absensi</th>
                            <th>ID Karyawan</th>
                            <th>Tanggal</th>
                            <th>Status Absensi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelAbsensi">
                        <!-- Data dummy absensi -->
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>2024-09-20</td>
                            <td>Hadir</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>002</td>
                            <td>2024-09-20</td>
                            <td>Sakit</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>003</td>
                            <td>2024-09-20</td>
                            <td>Tanpa Keterangan</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>001</td>
                            <td>2024-09-21</td>
                            <td>Izin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('#tabelAbsensi tr');
        
        rows.forEach(function(row) {
            var idKaryawan = row.cells[1].textContent.toLowerCase();
            if (idKaryawan.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Fungsi penyaringan berdasarkan status absensi
    document.getElementById('filterStatus').addEventListener('change', function() {
        var filterValue = this.value;
        var rows = document.querySelectorAll('#tabelAbsensi tr');
        
        rows.forEach(function(row) {
            var status = row.cells[3].textContent;
            if (filterValue === '' || status === filterValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
