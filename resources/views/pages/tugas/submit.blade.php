@extends('layouts.template_default')
@section('title', 'Submit Tugas')
@section('content')
<div class="content-wrapper">
    @include('sweetalert::alert')
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Submit Tugas</h3>
            </div>
            <form action="{{ route('tugas.submit', $tugas->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
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
