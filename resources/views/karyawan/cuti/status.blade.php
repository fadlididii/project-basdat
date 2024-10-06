@extends('karyawan.layouts.app')

@section('title', 'Status Persetujuan Cuti')

@section('contents')
    <div class="container py-4">
        <h1 class="text-center my-4">Status Persetujuan Cuti</h1>

        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Alasan</th>
                            <th>Persetujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cutis = App\Models\Cuti::where('id_karyawan', Auth::id())->get(); // Ambil semua cuti untuk pengguna yang sedang login
                        @endphp
                        @foreach($cutis as $cuti)
                            <tr>
                                <td>{{ $cuti->tanggal_mulai }}</td>
                                <td>{{ $cuti->tanggal_selesai }}</td>
                                <td>{{ $cuti->alasan }}</td>
                                <td>{{ $cuti->persetujuan ? 'Disetujui' : 'Belum Disetujui' }}</td> {{-- Menampilkan status persetujuan --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
