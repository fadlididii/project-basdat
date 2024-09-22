@extends('hrd.layouts.app')

@section('title', 'Persetujuan Cuti HRD')

@section('contents')
<div class="container py-4">
    <h1 class="text-center mb-4">Persetujuan Pengajuan Cuti</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID Cuti</th>
                        <th>ID Karyawan</th> <!-- Tambahkan kolom ID Karyawan -->
                        <th>Nama Karyawan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Data dummy diperbarui dengan ID Karyawan
                        $dummyData = [
                            ['id' => 1, 'employee_id' => 'EMP001', 'name' => 'John Doe', 'start' => '2024-09-25', 'end' => '2024-09-27', 'reason' => 'Liburan keluarga', 'status' => 'Menunggu'],
                            ['id' => 2, 'employee_id' => 'EMP002', 'name' => 'Jane Smith', 'start' => '2024-10-01', 'end' => '2024-10-03', 'reason' => 'Urusan pribadi', 'status' => 'Menunggu'],
                            ['id' => 3, 'employee_id' => 'EMP003', 'name' => 'Bob Johnson', 'start' => '2024-09-30', 'end' => '2024-10-02', 'reason' => 'Sakit', 'status' => 'Menunggu'],
                            ['id' => 4, 'employee_id' => 'EMP004', 'name' => 'Alice Brown', 'start' => '2024-10-05', 'end' => '2024-10-07', 'reason' => 'Seminar', 'status' => 'Menunggu'],
                        ];
                    @endphp

                    @foreach($dummyData as $cuti)
                        <tr>
                            <td>{{ $cuti['id'] }}</td>
                            <td>{{ $cuti['employee_id'] }}</td> <!-- Tampilkan ID Karyawan -->
                            <td>{{ $cuti['name'] }}</td>
                            <td>{{ $cuti['start'] }}</td>
                            <td>{{ $cuti['end'] }}</td>
                            <td>{{ $cuti['reason'] }}</td>
                            <td>
                                <span class="badge badge-warning text-uppercase">
                                    {{ $cuti['status'] }}
                                </span>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approve_{{ $cuti['id'] }}" id="approve_yes_{{ $cuti['id'] }}" value="Ya">
                                    <label class="form-check-label" for="approve_yes_{{ $cuti['id'] }}">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="approve_{{ $cuti['id'] }}" id="approve_no_{{ $cuti['id'] }}" value="Tidak">
                                    <label class="form-check-label" for="approve_no_{{ $cuti['id'] }}">Tidak</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="submitApprovals()">Simpan Persetujuan</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function submitApprovals() {
        let approvals = [];

        @php
        foreach ($dummyData as $cuti) {
            echo "
            let approval = document.querySelector('input[name=\"approve_{$cuti['id']}\"]:checked');
            if (approval) {
                approvals.push({ id: {$cuti['id']}, status: approval.value });
            } else {
                alert('Harap pilih Ya atau Tidak untuk ID Cuti {$cuti['id']}');
                return;
            }";
        }
        @endphp

        console.log('Persetujuan:', approvals);
        alert('Persetujuan berhasil disimpan! Lihat konsol untuk detail.');
    }
</script>
@endpush

@push('styles')
<style>
    /* Styling for the table */
    .table {
        margin-bottom: 0;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
        text-transform: uppercase;
        color: #4e73df;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }

    /* Styling for the card container */
    .card {
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    /* Styling for the badges */
    .badge-warning {
        background-color: #f6c23e;
        padding: 5px 10px;
        font-size: 0.9rem;
    }

    /* Button hover effect */
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .btn-primary:hover {
        background-color: #3751aa;
        border-color: #3751aa;
    }

    /* Table padding */
    .table th, .table td {
        padding: 12px;
        vertical-align: middle;
    }
</style>
@endpush
