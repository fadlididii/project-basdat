@extends('karyawan.layouts.app')

@section('contents')
<div class="container py-5">
    <h1 class="text-center mb-4">Absensi Jam Masuk</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($absen) && $absen)
        <div class="alert alert-info text-center">
            Anda sudah melakukan absensi hari ini.
        </div>
    @else
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
        <form id="uploadForm" action="{{ route('upload-absen-masuk') }}" method="POST" enctype="multipart/form-data" style="display: none;">
            @csrf
            <input type="hidden" name="image" id="imageData">
            <input type="hidden" name="status_absensi" id="status_absensi_value">
            <button type="submit" class="btn btn-primary d-block mx-auto">Submit Absensi Jam Masuk</button>
        </form>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
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
        const status = statusAbsensi.value;
        statusAbsensiValue.value = status;

        if (status === 'Hadir') {
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
                    // Sembunyikan video jika terjadi error
                    video.style.display = 'none';
                    alert('Tidak bisa mengakses kamera. Pastikan browser memiliki izin.');
                });
        } else {
            // Jika statusnya Sakit/Izin, langsung submit tanpa perlu kamera
            imageData.value = '';
            uploadForm.style.display = 'block'; // Tampilkan tombol submit jika tidak perlu foto
        }
    });

    // Ambil foto saat tombol "Ambil Foto" diklik
    snap.addEventListener('click', () => {
        // Pastikan video berjalan sebelum mengambil gambar
        if (video.srcObject) {
            // Ambil gambar dari video dan letakkan di canvas
            context.drawImage(video, 0, 0, 640, 480);
            const imageDataUrl = canvas.toDataURL('image/png'); // Ubah ke base64
            imageData.value = imageDataUrl; // Set nilai input hidden image dengan base64 image
            statusAbsensiValue.value = statusAbsensi.value; // Simpan status absensi

            // Tampilkan form upload setelah foto diambil
            uploadForm.style.display = 'block';
        } else {
            alert('Kamera tidak tersedia.');
        }
    });
});

</script>
@endsection
