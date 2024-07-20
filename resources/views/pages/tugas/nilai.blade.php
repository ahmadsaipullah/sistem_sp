@extends('layouts.template_default')
@section('title', 'Nilai Tugas')
@section('content')
<div class="content-wrapper">
    @include('sweetalert::alert')
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Nilai Tugas</h3>
            </div>
            <form action="{{ route('tugas.nilai', $tugas->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" value="{{ $tugas->nilai ?? '' }}" required>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Nilai</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
