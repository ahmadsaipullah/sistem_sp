@extends('layouts.template_default')
@section('title', 'Data Mahasiswa Bimbingan')
@section('datamahasiswabimbingan', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Mahasiswa Bimbingan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa Bimbingan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>foto</th>
                                            <th>Tanggal</th>
                                            <th>Nim Mahasiswa</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nama Dosen Pembimbing</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengajuanDosens as $pengajuan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="text-center">
                                                    @if ($pengajuan->user->image)
                                                    <img src="{{Storage::url($pengajuan->user->image)}}" alt="gambar" width="120px"
                                                        class="tumbnail img-fluid rounded-circle">
                                                @else
                                                    <img alt="image" class="img-fluid tumbnail"
                                                        src="{{ asset('assets/img/user_default.png') }}" width="120px"
                                                        class="tumbnail img-fluid">
                                                @endif
                                                </div>

                                        </td>
                                            <td>{{$pengajuan->created_at->isoformat('DD MMMM Y')}}</td>
                                            <td>{{ $pengajuan->user->nim }}</td>
                                            <td>{{ $pengajuan->user->name }}</td>
                                            <td>{{ $pengajuan->dosen->name }}</td>
                                            <td>{{ $pengajuan->judul }}</td>
                                            <td>{{ $pengajuan->deskripsi }}</td>
                                            <td>{{ $pengajuan->keterangan->name }}</td>
                                            <td>{{ $pengajuan->statusPengajuanJudul->status }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"><span class="d-flex justify-content-center">Belum ada pengajuan</span></td>
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
        <!-- /.content --> --}}


         <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row">
            @foreach($pengajuanDosens as $pengajuan)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
               <Span>{{ $pengajuan->user->nim }}</Span>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>{{ $pengajuan->user->name }}</b></h2>
                    <p class="text-muted text-sm"><b>Judul: </b> {{$pengajuan->judul}} </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> {{ $pengajuan->dosen->name }}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> {{$pengajuan->created_at->isoformat('DD MMMM Y')}}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ $pengajuan->user->no_hp }}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-book"></i></span> <span class="btn btn-xs btn-success">{{ $pengajuan->keterangan->name }}</span> </li>

                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    @if ($pengajuan->user->image)

                        <img src="{{ Storage::url($pengajuan->user->image) }}" alt="gambar"
                        width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                @else
                    <img alt="image" class="img-fluid tumbnail"
                        src="{{ asset('assets/img/user_default.png') }}" width="120px"
                        class="tumbnail img-fluid">
                @endif
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  {{-- <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                  </a> --}}
                  <a href="{{route('bimbingan.detail', encrypt($pengajuan->id))}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Detail Bimbingan
                  </a>

                </div>
              </div>
            </div>
          </div>
@endforeach
        </div>
      </div>

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
    </div>
@endsection
