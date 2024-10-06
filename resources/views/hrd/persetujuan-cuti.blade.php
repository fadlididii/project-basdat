@extends('hrd.layouts.app')

@section('title', 'Persetujuan Cuti HRD')

@section('contents')
<div class="container py-4">
    <h1 class="text-center my-4">Persetujuan Pengajuan Cuti</h1>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ID Cuti</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jenis Cuti</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuti as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->karyawan->nama }}</td>
                            <td>{{ $c->tanggal_mulai }}</td>
                            <td>{{ $c->tanggal_selesai }}</td>
                            <td>{{ ucfirst($c->jenis_cuti) }}</td>
                            <td>{{ $c->keterangan }}</td>
                            <td>
                                <span class="badge {{ $c->status == 'Menunggu' ? 'badge-warning' : ($c->status == 'Disetujui' ? 'badge-success' : 'badge-danger') }}">
                                    {{ $c->status }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('hrd.update-cuti', $c->id) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Disetujui" {{ $c->status == 'Disetujui' ? 'checked' : '' }}>
                                        <label class="form-check-label">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="Ditolak" {{ $c->status == 'Ditolak' ? 'checked' : '' }}>
                                        <label class="form-check-label">Tidak</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
