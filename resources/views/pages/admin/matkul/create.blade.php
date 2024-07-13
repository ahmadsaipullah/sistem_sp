@extends('layouts.template_default')

@section('title', 'Create Matkul')

@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Matkul</h3>
                </div>
                <form action="{{ route('matkul.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="dosen_id">Dosen</label>
                            <select class="form-control" id="dosen_id" name="dosen_id" required>
                                <option value="" disabled selected>-- Pilih Dosen --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="matkul">Matkul</label>
                            <input type="text" class="form-control @error('matkul') is-invalid @enderror"
                                   id="matkul" name="matkul" placeholder="Matkul" value="{{ old('matkul') }}" required/>
                            @error('matkul')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sks">Sks</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror"
                                   id="sks" name="sks" placeholder="Sks" value="{{ old('sks') }}" required/>
                            @error('sks')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   id="harga" name="harga" placeholder="Harga" value="{{ old('harga') }}" required/>
                            @error('harga')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
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
