@extends('hrd.layouts.app')

@section('title', 'Dashboard OLAP')

@section('contents')
<div class="container py-4">
    <h1 class="text-center mb-4">Dashboard</h1>

    <!-- Dropdown Tahun -->
    <div class="mb-4 text-center">
        <form method="GET" action="{{ route('hrd.dashboard') }}">
            <label for="tahun" class="form-label">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="form-select w-auto d-inline">
                <option value="2023" {{ $selectedYear == 2023 ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ $selectedYear == 2024 ? 'selected' : '' }}>2024</option>
            </select>

            <label for="kuartal" class="form-label">Pilih Kuartal:</label>
            <select name="kuartal" id="kuartal" class="form-select w-auto d-inline">
                <option value="all" {{ $selectedQuarter == 'all' ? 'selected' : '' }}>Seluruh Tahun</option>
                <option value="Q1" {{ $selectedQuarter == 'Q1' ? 'selected' : '' }}>Q1</option>
                <option value="Q2" {{ $selectedQuarter == 'Q2' ? 'selected' : '' }}>Q2</option>
                <option value="Q3" {{ $selectedQuarter == 'Q3' ? 'selected' : '' }}>Q3</option>
                <option value="Q4" {{ $selectedQuarter == 'Q4' ? 'selected' : '' }}>Q4</option>
            </select>

            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </form>
    </div>

    <!-- Informasi Tetap -->
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm bg-light p-3">
                <h5>Total Gaji ({{ $selectedYear }})</h5>
                <p class="text-danger fs-4">Rp {{ number_format($totalGaji, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-light p-3">
                <h5>Total Hari Cuti</h5>
                <p class="text-primary fs-4">{{ number_format($totalHariCuti, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-light p-3">
                <h5>Total Karyawan</h5>
                <p class="text-success fs-4">{{ $totalKaryawan }}</p>
            </div>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row">
        <!-- Line Chart: Gaji Bulanan -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">Gaji Bulanan ({{ $selectedYear }})</h5>
                <canvas id="gajiBulananChart"></canvas>
            </div>
        </div>

        <!-- Bar Chart: Gaji Per Kuartal -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5 class="text-center">Gaji per Kuartal ({{ $selectedYear }})</h5>
                <canvas id="gajiPerKuartalChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bar Chart: Hari Cuti Per Kuartal -->
    <div class="card shadow-sm p-3 mb-4">
        <h5 class="text-center">Hari Cuti per Kuartal ({{ $selectedYear }})</h5>
        <canvas id="cutiPerKuartalChart"></canvas>
    </div>
    <!-- Row for Pie Charts -->
    <div class="row">
        <!-- Pie Chart: Gaji Berdasarkan Jenis Karyawan -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">Distribusi Gaji Berdasarkan Jenis Karyawan ({{ $selectedYear }})</h5>
                <canvas id="gajiPerJenisChart"></canvas>
            </div>
        </div>

        <!-- Pie Chart: Hari Cuti Berdasarkan Jenis Karyawan -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">Distribusi Hari Cuti Berdasarkan Jenis Karyawan ({{ $selectedYear }})</h5>
                <canvas id="cutiPerJenisChart"></canvas>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">Top 5 Penilaian Kinerja ({{ $selectedYear }}, {{ $selectedQuarter == 'all' ? 'Seluruh Tahun' : $selectedQuarter }})</h5>
                <canvas id="top5PerformaChart"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">Top 5 Gaji Bonus ({{ $selectedYear }}, {{ $selectedQuarter == 'all' ? 'Seluruh Tahun' : $selectedQuarter }})</h5>
                <canvas id="top5BonusChart"></canvas>
            </div>
        </div>
    </div>


</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data untuk Gaji Bulanan
    const gajiLabels = @json($gajiBulanan->pluck('bulan'));
    const gajiData = @json($gajiBulanan->pluck('total_gaji'));

    new Chart(document.getElementById('gajiBulananChart'), {
        type: 'line',
        data: {
            labels: gajiLabels,
            datasets: [{
                label: 'Total Gaji',
                data: gajiData,
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false
            }]
        }
    });

    // Data untuk Gaji Per Kuartal
    const kuartalLabels = @json($gajiPerKuartal->pluck('kuartal'));
    const kuartalData = @json($gajiPerKuartal->pluck('total_gaji'));

    new Chart(document.getElementById('gajiPerKuartalChart'), {
        type: 'bar',
        data: {
            labels: kuartalLabels,
            datasets: [{
                label: 'Total Gaji',
                data: kuartalData,
                backgroundColor: 'rgba(153, 102, 255, 0.6)'
            }]
        }
    });

    // Data untuk Hari Cuti per Kuartal
    const cutiKuartalLabels = @json($cutiPerKuartal->pluck('kuartal'));
    const cutiKuartalData = @json($cutiPerKuartal->pluck('total_hari'));

    new Chart(document.getElementById('cutiPerKuartalChart'), {
        type: 'bar',
        data: {
            labels: cutiKuartalLabels,
            datasets: [{
                label: 'Total Hari Cuti',
                data: cutiKuartalData,
                backgroundColor: 'rgba(255, 159, 64, 0.6)'
            }]
        }
    });
    
    // Data untuk Top 5 Penilaian Kinerja
    const top5PerformaLabels = @json($top5Performa->pluck('nama_karyawan'));
    const top5PerformaData = @json($top5Performa->pluck('total_nilai'));

    new Chart(document.getElementById('top5PerformaChart'), {
        type: 'bar',
        data: {
            labels: top5PerformaLabels,
            datasets: [{
                label: 'Total Nilai',
                data: top5PerformaData,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });
    
    // Data untuk Top 5 Gaji Bonus
    const top5BonusLabels = @json($top5Bonus->pluck('nama_karyawan'));
    const top5BonusData = @json($top5Bonus->pluck('total_bonus'));

    new Chart(document.getElementById('top5BonusChart'), {
        type: 'bar',
        data: {
            labels: top5BonusLabels,
            datasets: [{
                label: 'Total Bonus',
                data: top5BonusData,
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        }
    });

    // Data untuk Pie Chart Gaji Berdasarkan Jenis Karyawan
    const gajiJenisLabels = @json($gajiPerJenis->pluck('nama_jenis'));
    const gajiJenisData = @json($gajiPerJenis->pluck('total_gaji'));

    new Chart(document.getElementById('gajiPerJenisChart'), {
        type: 'pie',
        data: {
            labels: gajiJenisLabels,
            datasets: [{
                label: 'Total Gaji',
                data: gajiJenisData,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Warna biru
                    'rgba(255, 159, 64, 0.6)', // Warna oranye
                    'rgba(54, 162, 235, 0.6)', // Warna hijau
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'bottom' },
                title: { display: true, text: 'Distribusi Gaji Berdasarkan Jenis Karyawan' }
            }
        }
    });

    // Data untuk Pie Chart Hari Cuti Berdasarkan Jenis Karyawan
    const cutiJenisLabels = @json($cutiPerJenis->pluck('nama_jenis'));
    const cutiJenisData = @json($cutiPerJenis->pluck('total_cuti'));

    new Chart(document.getElementById('cutiPerJenisChart'), {
        type: 'pie',
        data: {
            labels: cutiJenisLabels,
            datasets: [{
                label: 'Total Hari Cuti',
                data: cutiJenisData,
                backgroundColor: [
                    'rgba(255, 206, 86, 0.6)', // Warna kuning
                    'rgba(75, 192, 192, 0.6)', // Warna biru
                    'rgba(153, 102, 255, 0.6)', // Warna ungu
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'bottom' },
                title: { display: true, text: 'Distribusi Hari Cuti Berdasarkan Jenis Karyawan' }
            }
        }
    });
</script>
@endsection
