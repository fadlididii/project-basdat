@extends('karyawan.layouts.app')

@section('contents')
<div class="container py-5">
    <h1 class="text-center mb-4">Absensi Jam Keluar</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form status absensi -->
    <form id="statusForm" class="mb-4">
        <div class="mb-3">
            <label for="status_absensi" class="form-label">Status Absensi:</label>
            <select class="form-select" name="status_absensi" id="status_absensi" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
        </div>
        <button type="button" id="nextStep" class="btn btn-primary">Lanjutkan</button>
    </form>

    <!-- Video untuk menampilkan kamera -->
    <div class="text-center">
        <video id="video" class="border rounded shadow-sm mb-3" width="640" height="480" autoplay style="display: none;"></video>
        <button id="snap" class="btn btn-success mb-3" style="display: none;">Ambil Foto</button>
    </div>

    <!-- Canvas untuk menampilkan hasil foto -->
    <canvas id="canvas" width="640" height="480" class="d-block mx-auto mb-4" style="display: none;"></canvas>

    <!-- Form untuk mengirimkan foto ke backend -->
    <form id="uploadForm" action="/upload-absen-keluar" method="POST" enctype="multipart/form-data" style="display: none;">
        @csrf
        <input type="hidden" name="image" id="imageData">
        <input type="hidden" name="status_absensi" id="status_absensi_value">
        <button type="submit" class="btn btn-primary d-block mx-auto">Submit Absensi Jam Keluar</button>
    </form>
</div>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    const snap = document.getElementById('snap');
    const statusForm = document.getElementById('statusForm');
    const nextStep = document.getElementById('nextStep');
    const uploadForm = document.getElementById('uploadForm');
    const imageData = document.getElementById('imageData');
    const statusAbsensi = document.getElementById('status_absensi');
    const statusAbsensiValue = document.getElementById('status_absensi_value');

    // Ketika status absensi dipilih dan dilanjutkan
    nextStep.addEventListener('click', () => {
        if (statusAbsensi.value === 'Hadir') {
            // Tampilkan kamera dan tombol ambil foto
            video.style.display = 'block';
            snap.style.display = 'block';

            // Minta akses kamera
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;
                })
                .catch((err) => {
                    console.error('Error accessing camera: ', err);
                });
        }
    });

    // Ambil foto saat tombol "Ambil Foto" diklik
    snap.addEventListener('click', () => {
        context.drawImage(video, 0, 0, 640, 480);
        const imageDataUrl = canvas.toDataURL('image/png');
        imageData.value = imageDataUrl;
        statusAbsensiValue.value = statusAbsensi.value;

        // Tampilkan form upload setelah foto diambil
        uploadForm.style.display = 'block';
    });
</script>
@endsection
