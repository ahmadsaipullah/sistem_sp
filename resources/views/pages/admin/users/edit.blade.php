@extends('layouts.template_default')
@section('title', 'Update Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" placeholder="Name" value="{{ old('name') ?? $admin->name }}" required/>
                                    @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM / NIDN</label>
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                           id="nim" name="nim" placeholder="Nim / Nidn" value="{{ old('nim') ?? $admin->nim }}" required/>
                                    @error('nim')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                           id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $admin->no_hp }}" required/>
                                    @error('no_hp')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" placeholder="Email" value="{{ old('email') ?? $admin->email }}" required/>
                                    @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Password" value="{{ old('email') ?? $admin->password }}" required />
                                    @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level_id">Level User</label>
                                    <select class="form-control" id="level_id" name="level_id">
                                        <option value="{{ $admin->level_id }}" selected>{{ $admin->level->level }}</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dosen_id">Dosen</label>
                                    <select class="form-control @error('dosen_id') is invalid
                                    @enderror" id="dosen_id" name="dosen_id">
                                        @if ($admin->dosen_id)
                                            <option value="{{ $admin->dosen_id }}" selected>{{ $admin->Dosen->name }}</option>
                                        @else
                                            <option value="" selected>-- Pilih Dosen --</option>
                                        @endif
                                        @foreach ($dosens as $dosen)
                                            <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('dosen_id')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="{{ $admin->gender }}" selected>{{ $admin->gender }}</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    @if ($admin->image)
                                        <img src="{{ Storage::url($admin->image) }}" alt="gambar"
                                             style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/img/user_default.png') }}" alt="image"
                                             style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                    @endif
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
