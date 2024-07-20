@extends('layouts.template_default')
@section('title', 'Halaman Matkul')
@section('pendaftaran', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Matkul</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Matkul</li>
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
                            <div class="card-header">
                                <a class="btn btn-primary" href="{{ route('matkul.create') }}"><i class="fa fa-plus"></i>
                                    Tambah Matkul</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dosen</th>
                                            <th>Matkul</th>
                                            <th>Sks</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($matkuls as $matkul)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $matkul->Dosen->name }}</td>
                                                <td>{{ $matkul->matkul }}</td>
                                                <td>{{ $matkul->sks }}</td>
                                                <td>{{ 'Rp. ' . number_format($matkul->harga, 0, ',', '.') }}</td>
                                                <td>

                                                    <div class="text-center">
                                                        <a href="{{ route('pendaftaran.create', $matkul->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pen">Daftar</i>
                                                        </a>
                                                    </div>

                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-5">Data Kosong</td>
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
