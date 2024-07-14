@extends('layouts.template_default')
@section('title', 'Update Dosen')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Dosen</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is invalid

              @enderror"
                                id="name" name="name" placeholder="Name" value="{{ old('name') ?? $dosen->name }}"
                                required />
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="number" class="form-control @error('nidn') is invalid

              @enderror"
                                id="nidn" name="nidn" placeholder="nidn / Nidn"
                                value="{{ old('nidn') ?? $dosen->nidn }}" required />
                            @error('nidn')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" class="form-control @error('no_hp') is invalid

                @enderror"
                                id="no_hp" name="no_hp" placeholder="Nomor Handphone"
                                value="{{ old('no_hp') ?? $dosen->no_hp }}" required />
                            @error('no_hp')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is invalid

              @enderror"
                                id="email" name="email" placeholder="Email"
                                value="{{ old('email') ?? $dosen->email }}" required />
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
