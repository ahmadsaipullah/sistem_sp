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
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="Name" value="{{ old('name') ?? $admin->name }}" required/>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nopol">Nomor Polisi</label>
                            <input type="text" class="form-control @error('nopol') is-invalid @enderror"
                                   id="nopol" name="nopol" placeholder="Nomor Polisi" value="{{ old('nopol') ?? $admin->nopol }}" required/>
                            @error('nopol')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_rangka">Nomor Rangka</label>
                            <input type="text" class="form-control @error('no_rangka') is-invalid @enderror"
                                   id="no_rangka" name="no_rangka" placeholder="Nomor Rangka" value="{{ old('no_rangka') ?? $admin->no_rangka }}" required/>
                            @error('no_rangka')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                   id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $admin->no_hp }}" required/>
                            @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" placeholder="Email" value="{{ old('email') ?? $admin->email }}" required/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="Password" value="{{ old('password') ?? $admin->password }}" required/>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="level_id">Level User</label>
                            <select class="form-control" id="level_id" name="level_id">
                                <option value="{{ $admin->level_id }}">{{ $admin->level->level }}</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipe_mobil">Type Mobil</label>
                            <input type="text" class="form-control @error('tipe_mobil') is-invalid @enderror"
                                   id="tipe_mobil" name="tipe_mobil" placeholder="Type Mobil" value="{{ old('tipe_mobil') ?? $admin->tipe_mobil }}" required/>
                            @error('tipe_mobil')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ old('alamat') ?? $admin->alamat }}</textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if ($admin->image)
                                <img src="{{ Storage::url($admin->image) }}" alt="gambar" width="120px"
                                     style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                            @else
                                <img alt="image" class="img-fluid thumbnail" src="{{ asset('assets/img/user_default.png') }}" width="120px">
                            @endif
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
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
