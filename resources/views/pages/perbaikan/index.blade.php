@extends('layouts.template_default')
@section('title', 'Data Mahasiswa SP')
@section('datamahasiswasp', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Mahasiswa SP</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa SP</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @forelse ($pengajuans as $pengajuan)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        <Span>{{ $pengajuan->user->nim }}</Span>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $pengajuan->user->name }}</b></h2>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-user"></i></span>
                                                        {{ $pengajuan->dosen->name }}</li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-calendar"></i></span>
                                                        {{ $pengajuan->created_at->isoformat('DD MMMM Y') }}</li>
                                                    <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-phone"></i></span>
                                                        {{ $pengajuan->user->no_hp }}</li>
                                                    @if ($pengajuan->keterangan_id == 2)
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-book"></i></span> <span
                                                                class="btn btn-xs btn-success">{{ $pengajuan->keterangan->name }}</span>
                                                        </li>
                                                    @elseif($pengajuan->keterangan_id == 1)
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-book"></i></span> <span
                                                                class="btn btn-xs btn-warning">{{ $pengajuan->keterangan->name }}</span>
                                                        </li>
                                                    @endif
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
                                            {{-- <a href="{{ route('bimbingan.detail', encrypt($pengajuan->id)) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Detail Bimbingan
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                              <div class="alert alert-danger text-center" role="alert">
                                Belum Ada Mahasiswa Yang Mendaftar!
                              </div>
                            </div>
                  @endforelse
                    </div>
                </div>

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
