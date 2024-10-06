@extends('karyawan.layouts.app')

@section('contents')
<div class="container py-5">
    <h1 class="text-center mb-4">Absensi Jam Keluar</h1>

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

    <!-- Pilih Status Absensi -->
    <form id="statusForm" class="mb-4">
        <div class="mb-3">
            <label for="status_absensi" class="form-label">Status Absensi:</label>
            <select class="form-select" id="status_absensi" name="status_absensi" required>
                <option value="">Pilih Status</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
        </div>
        <button type="button" id="nextStep" class="btn btn-primary">Lanjutkan</button>
    </form>

    <!-- Video untuk menampilkan kamera jika pilih Hadir -->
    <div class="text-center" id="cameraSection" style="display: none;">
        <video id="video" class="border rounded shadow-sm mb-3" width="640" height="480" autoplay style="display: none;"></video>
        <button id="snap" class="btn btn-success mb-3" style="display: none;">Ambil Foto</button>
    </div>

    <!-- Canvas untuk menampilkan hasil foto -->
    <canvas id="canvas" width="640" height="480" class="d-block mx-auto mb-4" style="display: none;"></canvas>

    <!-- Form untuk mengirimkan foto ke backend -->
    <form id="uploadForm" action="{{ route('upload-absen-keluar') }}" method="POST" enctype="multipart/form-data" style="display: none;">
        @csrf
        <input type="hidden" name="image" id="imageData">
        <input type="hidden" name="status_absensi" id="status_absensi_value">
        <button type="submit" class="btn btn-primary d-block mx-auto">Submit Absensi Jam Keluar</button>
    </form>

    <!-- Pesan jika pilih Izin atau Sakit -->
    <div id="noAbsenMessage" class="alert alert-info text-center" style="display: none;">
        Anda tidak perlu melakukan absensi keluar karena Anda izin/sakit.
    </div>

</div>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    const snap = document.getElementById('snap');
    const nextStep = document.getElementById('nextStep');
    const uploadForm = document.getElementById('uploadForm');
    const imageData = document.getElementById('imageData');
    const statusForm = document.getElementById('statusForm');
    const statusAbsensi = document.getElementById('status_absensi');
    const cameraSection = document.getElementById('cameraSection');
    const noAbsenMessage = document.getElementById('noAbsenMessage');
    const statusAbsensiValue = document.getElementById('status_absensi_value');

    // Ketika tombol "Lanjutkan" diklik
    nextStep.addEventListener('click', () => {
        const status = statusAbsensi.value;

        if (status === 'Hadir') {
            // Jika pilih Hadir, tampilkan kamera dan tombol ambil foto
            cameraSection.style.display = 'block';
            video.style.display = 'block';
            snap.style.display = 'block';
            noAbsenMessage.style.display = 'none'; // Sembunyikan pesan izin/sakit

            // Minta akses kamera
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;
                })
                .catch((err) => {
                    console.error('Error accessing camera: ', err);
                    alert('Tidak bisa mengakses kamera. Pastikan browser memiliki izin akses kamera.');
                });
        } else {
            // Jika pilih Izin atau Sakit, tampilkan pesan
            cameraSection.style.display = 'none';
            video.style.display = 'none';
            snap.style.display = 'none';
            noAbsenMessage.style.display = 'block'; // Tampilkan pesan izin/sakit
            uploadForm.style.display = 'none'; // Sembunyikan form upload
        }

        statusAbsensiValue.value = status; // Set nilai status absensi pada form
    });

    // Ambil foto saat tombol "Ambil Foto" diklik
    snap.addEventListener('click', () => {
        // Pastikan video berjalan sebelum mengambil gambar
        if (video.srcObject) {
            context.drawImage(video, 0, 0, 640, 480);
            const imageDataUrl = canvas.toDataURL('image/png'); // Konversi gambar ke base64
            imageData.value = imageDataUrl; // Masukkan base64 image ke input hidden

            // Tampilkan form upload setelah foto diambil
            uploadForm.style.display = 'block';
        } else {
            alert('Kamera tidak tersedia.');
        }
    });
</script>
@endsection
