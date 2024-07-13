@extends('layouts.template_default')
@section('title', 'Create Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is invalid

              @enderror"
                                id="name" name="name" placeholder="Name" value="{{old('name')}}" required/>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nopol">Nomor Polisi</label>
                            <input type="text" class="form-control @error('nopol') is invalid

              @enderror"
                                id="nopol" name="nopol" placeholder="nopol" value="{{old('nopol')}}" required/>
                            @error('nopol')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_rangka">Nomor Rangka</label>
                            <input type="text" class="form-control @error('no_rangka') is invalid

              @enderror"
                                id="no_rangka" name="no_rangka" placeholder="Nomor Rangka" value="{{old('no_rangka')}}" required/>
                            @error('nim')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" class="form-control @error('no_hp') is invalid

                @enderror"
                                id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{old('no_hp')}}" required/>
                            @error('no_hp')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is invalid

              @enderror"
                                id="email" name="email" placeholder="Email" value="{{old('email')}}" required/>
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipe_mobil">Type Mobil</label>
                            <input type="text" class="form-control @error('tipe_mobil') is invalid

              @enderror"
                                id="tipe_mobil" name="tipe_mobil" placeholder="Type Mobil" value="{{old('tipe_mobil')}}" required/>
                            @error('tipe_mobil')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat"  rows="5" class="form-control @error('alamat') is invalid

                            @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                class="form-control @error('password') is invalid

              @enderror" id="password"
                                name="password" placeholder="Password" required />
                            @error('password')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="level_id">Level User</label>
                            <select class="form-control" id="level_id" name="level_id">
                                <option disabled selected>-- Pilih Level User --</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach

                            </select>
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
