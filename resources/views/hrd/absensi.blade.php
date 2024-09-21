@extends('hrd.layouts.app')

@section('title', 'Absensi')

@section('contents')
<div class="container-fluid py-4">
    <div class="row">
        <main class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Absensi Karyawan</h1>
                        <div class="d-flex">
                            <input type="text" id="searchInput" class="form-control form-control-sm me-2" placeholder="Cari Karyawan...">
                            <select id="filterStatus" class="form-select form-select-sm">
                                <option value="">Semua Status</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle" id="absensiTable">
                            <thead>
                                <tr>
                                    <th>ID Absensi</th>
                                    <th>ID Karyawan</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Status Absensi</th>
                                    <th>Role</th>
                                    <th>Nomor Telepon</th>
                                </tr>
                            </thead>
                            <tbody id="tabelAbsensi">
                                <tr>
                                    <td>1</td>
                                    <td>001</td>
                                    <td>John Doe</td>
                                    <td>2024-09-20</td>
                                    <td><span class="badge bg-success">Hadir</span></td>
                                    <td>Manager</td>
                                    <td>081234567890</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>002</td>
                                    <td>Jane Smith</td>
                                    <td>2024-09-20</td>
                                    <td><span class="badge bg-warning text-dark">Sakit</span></td>
                                    <td>Staff</td>
                                    <td>081234567891</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
    .container-fluid {
        max-width: 1400px;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    #absensiTable {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 0.5rem;
    }

    #absensiTable th {
        background-color: #f8f9fa;
        border: none;
        padding: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.05rem;
    }

    #absensiTable td {
        background-color: #ffffff;
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }

    #absensiTable tr {
        box-shadow: 0 2px 5px rgba(0,0,0,.05);
        transition: all 0.3s ease;
    }

    #absensiTable tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,.1);
    }

    .badge {
        padding: 0.5em 1em;
        border-radius: 30px;
    }

    #searchInput, #filterStatus {
        border-radius: 20px;
        border: 1px solid #ced4da;
        padding: 0.375rem 1rem;
    }

    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }
        #searchInput, #filterStatus {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const tableRows = document.querySelectorAll('#tabelAbsensi tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value.toLowerCase();

        tableRows.forEach(row => {
            const idKaryawan = row.cells[1].textContent.toLowerCase();
            const namaKaryawan = row.cells[2].textContent.toLowerCase();
            const status = row.cells[4].textContent.toLowerCase();

            const matchesSearch = idKaryawan.includes(searchTerm) || namaKaryawan.includes(searchTerm);
            const matchesStatus = statusFilter === '' || status.includes(statusFilter);

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterTable);
    filterStatus.addEventListener('change', filterTable);
});
</script>
@endsection