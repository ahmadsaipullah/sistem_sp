@extends('layouts.template_default')
@section('title', 'Beri Tugas')
@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Beri Tugas</h3>
            </div>
            <form action="{{ route('tugas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="user_id" value="{{ $mahasiswa->user_id }}">
                    <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
                    <div class="form-group">
                        <label for="mahasiswa">Mahasiswa</label>
                        <input type="text" class="form-control" id="mahasiswa" value="{{ $mahasiswa->User->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dosen">Dosen</label>
                        <input type="text" class="form-control" id="dosen" value="{{ $dosen->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Tugas</label>
                        <textarea class="form-control summernote" id="summernote" name="deskripsi" required></textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="file">File (Opsional)</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div> --}}
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Beri Tugas</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
