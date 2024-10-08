@extends('karyawan.layouts.app')

@section('title', 'Pengajuan Cuti')

@section('contents')
    <div class="container py-4">
        <h1 class="text-center my-4">Form Pengajuan Cuti</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <form action="{{ route('cuti.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="tanggal_mulai" class="font-weight-bold">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_selesai" class="font-weight-bold">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_cuti" class="font-weight-bold">Jenis Cuti</label>
                            <select class="form-control" id="jenis_cuti" name="jenis_cuti" required>
                                <option value="">Pilih Jenis Cuti</option>
                                <option value="tahunan">Cuti Tahunan</option>
                                <option value="sakit">Cuti Sakit</option>
                                <option value="melahirkan">Cuti Melahirkan</option>
                                <option value="lainnya">Cuti Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan cuti..." required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
