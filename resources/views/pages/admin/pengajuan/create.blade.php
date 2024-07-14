@extends('layouts.template_default')
@section('title', 'Create Pengajuan')
@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="text-center">Create Pengajuan</h3>
            </div>
            @include('sweetalert::alert')
            <form action="{{ route('pengajuan.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="" disabled selected>-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="matkul_id">Matkul</label>
                        <select class="form-control" id="matkul_id" name="matkul_id" required>
                            <option value="" disabled selected>-- Pilih Matkul --</option>
                            @foreach ($matkuls as $matkul)
                                <option value="{{ $matkul->id }}"
                                        data-dosen="{{ $matkul->dosen_id }}"
                                        data-dosen-name="{{ $matkul->dosen->name }}"
                                        data-sks="{{ $matkul->sks }}"
                                        data-harga="{{ $matkul->harga }}">{{ $matkul->matkul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dosen_id">Dosen</label>
                        <input type="text" class="form-control" id="dosen_name" name="dosen_name" readonly required>
                        <input type="hidden" id="dosen_id" name="dosen_id">
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" readonly required>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const matkulSelect = document.getElementById('matkul_id');
        const dosenIdInput = document.getElementById('dosen_id');
        const dosenNameInput = document.getElementById('dosen_name');
        const sksInput = document.getElementById('sks');
        const hargaInput = document.getElementById('harga');

        matkulSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            dosenIdInput.value = selectedOption.getAttribute('data-dosen');
            dosenNameInput.value = selectedOption.getAttribute('data-dosen-name');
            sksInput.value = selectedOption.getAttribute('data-sks');
            hargaInput.value = selectedOption.getAttribute('data-harga');
        });

        // Trigger change event on page load to set initial value if any
        if (matkulSelect.value) {
            matkulSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection
