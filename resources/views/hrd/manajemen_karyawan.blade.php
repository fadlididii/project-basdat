@extends('hrd.layouts.app')

@section('title', 'Manajemen Karyawan')

@section('contents')
<div class="container-fluid py-4">
    <div class="row">
        <main class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manajemen Karyawan</h1>
                        <div class="d-flex">
                            <input type="text" id="searchInput" class="form-control form-control-sm me-2" placeholder="Cari Karyawan...">
                            <select id="filterRole" class="form-select form-select-sm">
                                <option value="">Semua Role</option>
                                <option value="Manager">Manager</option>
                                <option value="HRD">HRD</option>
                                <option value="Staff IT">Staff IT</option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
                        Tambah Karyawan Baru
                    </button>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle" id="karyawanTable">
                            <thead>
                                <tr>
                                    <th>ID Karyawan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tabelKaryawan">
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
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal for adding/editing employee -->
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
                        <label for="roleKaryawan" class="form-label">Role</label>
                        <input type="text" class="form-control" id="roleKaryawan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
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

    #karyawanTable {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 0.5rem;
    }

    #karyawanTable th {
        background-color: #f8f9fa;
        border: none;
        padding: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.05rem;
    }

    #karyawanTable td {
        background-color: #ffffff;
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }

    #karyawanTable tr {
        box-shadow: 0 2px 5px rgba(0, 0, 0, .05);
        transition: all 0.3s ease;
    }

    #karyawanTable tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
    }

    #searchInput, #filterRole {
        border-radius: 20px;
        border: 1px solid #ced4da;
        padding: 0.375rem 1rem;
    }

    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }

        #searchInput, #filterRole {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterRole = document.getElementById('filterRole');
    const tableRows = document.querySelectorAll('#tabelKaryawan tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const roleFilter = filterRole.value.toLowerCase();

        tableRows.forEach(row => {
            const namaKaryawan = row.cells[1].textContent.toLowerCase();
            const role = row.cells[4].textContent.toLowerCase();

            const matchesSearch = namaKaryawan.includes(searchTerm);
            const matchesRole = roleFilter === '' || role.includes(roleFilter);

            if (matchesSearch && matchesRole) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterTable);
    filterRole.addEventListener('change', filterTable);
});
</script>
@endsection
