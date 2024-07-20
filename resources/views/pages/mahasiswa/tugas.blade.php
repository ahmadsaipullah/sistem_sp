@extends('layouts.template_default')
@section('title', 'Daftar Tugas')
@section('tugas', 'active')
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
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tugass as $tugas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! $tugas->deskripsi !!}</td>
                                <td>
                                    @if($tugas->file_path)
                                        <a href="{{ Storage::url($tugas->file_path) }}" target="_blank">Download</a>
                                    @else
                                        Tidak ada file
                                    @endif
                                </td>
                                <td>{{ $tugas->nilai ?? 'Belum dinilai' }}</td>
                                <td>
                                    <a href="{{ route('tugas.submitForm', $tugas->id) }}" class="btn btn-sm btn-success">Submit Tugas</a>
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
