@extends('layouts.template_default')
@section('title', 'Status Pengajuan')
@section('status', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Status Pengajuan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Status Pengajuan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Kode</th>
                                            <th>Mahasiswa</th>
                                            <th>Dosen</th>
                                            <th>Matkul</th>
                                            <th>Sks</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Verifikasi Prodi</th>
                                            <th>Verifikasi Akademik</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengajuans as $pengajuan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($pengajuan->verifikasi_prodi_id == 1 && $pengajuan->verifikasi_akademik_id == 1)
                                                        <span class="btn btn-xs btn-success">Terverifikasi</span>
                                                    @else
                                                        <span class="btn btn-xs btn-danger">Ajukan Verifikasi</span>
                                                    @endif
                                                </td>

                                                <td>{{ $pengajuan->kode }}</td>
                                                <td>{{ $pengajuan->User->name }}</td>
                                                <td>{{ $pengajuan->Dosen->name }}</td>
                                                <td>{{ $pengajuan->MataKuliah->matkul }}</td>
                                                <td>{{ $pengajuan->sks }}</td>
                                                <td>{{ 'Rp. ' . number_format($pengajuan->harga, 0, ',', '.') }}</td>
                                                <td>{!! $pengajuan->deskripsi !!}</td>
                                                <td>
                                                    @if ($pengajuan->verifikasi_prodi_id == 1)
                                                   <span class="btn btn-xs btn-success">Approve</span>
                                                    @else
                                                    <span class="btn btn-xs btn-danger">Belum Di Verifikasi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($pengajuan->verifikasi_akademik_id == 1)
                                                    <span class="btn btn-xs btn-success">Approve</span>
                                                    @else
                                                    <span class="btn btn-xs btn-danger">Belum Di Verifikasi</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center p-5">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
