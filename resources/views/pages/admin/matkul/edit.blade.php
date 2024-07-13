@extends('layouts.template_default')

@section('title', 'Update Matkul')

@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Matkul</h3>
                </div>
                <form action="{{ route('matkul.update', $matkul->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="dosen_id">Dosen</label>
                            <select class="form-control" id="dosen_id" name="dosen_id" required>
                                <option value="" disabled>-- Pilih Dosen --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ $matkul->dosen_id == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="matkul">Matkul</label>
                            <input type="text" class="form-control @error('matkul') is-invalid @enderror"
                                   id="matkul" name="matkul" placeholder="Matkul" value="{{ old('matkul') ?? $matkul->matkul }}" required/>
                            @error('matkul')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sks">Sks</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror"
                                   id="sks" name="sks" placeholder="Sks" value="{{ old('sks') ?? $matkul->sks }}" required/>
                            @error('sks')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   id="harga" name="harga" placeholder="Harga" value="{{ old('harga') ??  $matkul->harga }}" required/>
                            @error('harga')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
