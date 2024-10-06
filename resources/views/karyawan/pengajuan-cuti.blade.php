@extends('karyawan.layouts.app') {{-- Meng-extend layout utama dari folder layouts --}}

@section('title', 'Pengajuan Cuti') {{-- Bagian untuk mengatur title halaman --}}

@section('contents') {{-- Bagian untuk mengisi konten halaman --}}
    <div class="container py-4"> {{-- Memberikan padding pada bagian atas dan bawah --}}
        <h1 class="text-center my-4">Form Pengajuan Cuti</h1> {{-- Mengatur heading ke tengah --}}

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center"> {{-- Membuat form responsif dan berada di tengah --}}
            <div class="col-md-6"> {{-- Mengatur lebar form agar sesuai di layar yang lebih kecil --}}
                <div class="card shadow-lg p-4"> {{-- Card dengan bayangan dan padding --}}
                    <form action="{{ route('karyawan.store-cuti') }}" method="POST"> {{-- Form pengajuan cuti --}}
                        @csrf {{-- Token CSRF Laravel untuk keamanan --}}

                        <div class="form-group mb-3">
                            <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_selesai" class="font-weight-bold">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_cuti" class="font-weight-bold">Jenis Cuti</label>
                            <select class="form-control" id="jenis_cuti" name="jenis_cuti" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <option value="tahunan" {{ old('jenis_cuti') == 'tahunan' ? 'selected' : '' }}>Cuti Tahunan</option>
                                <option value="sakit" {{ old('jenis_cuti') == 'sakit' ? 'selected' : '' }}>Cuti Sakit</option>
                                <option value="melahirkan" {{ old('jenis_cuti') == 'melahirkan' ? 'selected' : '' }}>Cuti Melahirkan</option>
                                <option value="lainnya" {{ old('jenis_cuti') == 'lainnya' ? 'selected' : '' }}>Cuti Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan cuti..." required>{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tabel untuk menampilkan riwayat pengajuan cuti --}}
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h3 class="text-center mb-4">Riwayat Pengajuan Cuti</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID Cuti</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jenis Cuti</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cutiHistory as $cuti)
                                <tr>
                                    <td>{{ $cuti->id }}</td>
                                    <td>{{ $cuti->tanggal_mulai }}</td>
                                    <td>{{ $cuti->tanggal_selesai }}</td>
                                    <td>{{ ucfirst($cuti->jenis_cuti) }}</td>
                                    <td>{{ $cuti->keterangan }}</td>
                                    <td>
                                        @if($cuti->status == 'Disetujui')
                                            <span class="badge badge-success">{{ $cuti->status }}</span>
                                        @elseif($cuti->status == 'Ditolak')
                                            <span class="badge badge-danger">{{ $cuti->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $cuti->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada pengajuan cuti.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
