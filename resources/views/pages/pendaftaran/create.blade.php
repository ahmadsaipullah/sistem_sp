@extends('layouts.template_default')
@section('title', 'Create Pengajuan')
@section('pendaftaran', 'active')
@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Pengajuan SP</h3>
            </div>
            <form action="{{ route('pendaftaran.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" readonly required>
                        <input type="text" class="form-control" id="" name="" value="{{ $user->name }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="matkul_id">Matkul</label>
                        <input type="hidden" class="form-control" id="matkul_id" name="matkul_id" value="{{ $matkul->id }}" readonly required>
                        <input type="text" class="form-control" id="" name="" value="{{ $matkul->matkul }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="dosen_id">Dosen</label>
                        <input type="text" class="form-control" id="" name="" value="{{ $matkul->dosen->name }}" readonly required>
                        <input type="hidden" id="dosen_id" name="dosen_id" value="{{ $matkul->dosen_id }}">
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks" value="{{ $matkul->sks }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $matkul->harga }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="summernote" name="deskripsi"></textarea>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
