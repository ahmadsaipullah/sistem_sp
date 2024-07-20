@extends('layouts.template_default')
@section('title', 'Daftar Tugas')
@section('content')
<div class="content-wrapper">
    @include('sweetalert::alert')
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Daftar Tugas</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    {{-- <div class="card-header">
                        <a class="btn btn-primary" href="{{ route('tugas.create', $mahasiswa->id) }}"><i class="fa fa-plus"></i> Beri Tugas</a>
                    </div> --}}
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mahasiswa</th>
                            <th>Dosen</th>
                            <th>Deskripsi</th>
                            <th>Jawaban</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tugass as $tugas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tugas->User->name }}</td>
                                <td>{{ $tugas->Dosen->name }}</td>
                                <td>{!! $tugas->deskripsi !!}</td>
                                <td>
                                    @if($tugas->file_path)
                                        <a href="{{ Storage::url($tugas->file_path) }}" target="_blank">Download</a>
                                    @else
                                       Belum ada file Jawaban
                                    @endif
                                </td>
                                <td>{{ $tugas->nilai ?? 'Belum dinilai' }}</td>
                                <td>
                                    <a href="{{ route('tugas.nilaiForm', $tugas->id) }}" class="btn btn-sm btn-primary">Nilai</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
