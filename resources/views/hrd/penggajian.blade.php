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
                <!-- Tabel Penggajian di Blade Template -->
                <table class="table table-bordered">
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
                        @foreach($dataPenggajian as $item)
                            <tr>
                                <td>{{ $item['id_karyawan'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>Rp {{ number_format($item['gaji_pokok'], 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item['gaji_bonus'], 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item['total_gaji'], 0, ',', '.') }}</td>
                                <td>
                                    <!-- Tombol Kirim Gaji -->
                                    <form action="{{ route('hrd.kirimGaji') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_karyawan" value="{{ $item['id_karyawan'] }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Kirim Informasi Gaji</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // AJAX untuk mengirim informasi gaji tanpa merubah URL
        $('.kirim-gaji-btn').on('click', function() {
            var id_penggajian = $(this).data('id');
            var namaKaryawan = $(this).data('nama'); // Ambil nama karyawan dari atribut data-nama

            $.ajax({
                url: '{{ route('hrd.kirimGaji') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id_penggajian: id_penggajian
                },
                success: function(response) {
                    alert('Informasi gaji sudah terkirim ke ' + namaKaryawan + '!');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengirim informasi gaji.');
                }
            });
        });
    });
</script>
@endsection
