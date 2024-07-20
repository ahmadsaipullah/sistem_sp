<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SISTEM SP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                @if (Auth::user()->image)
                    <img src="{{Storage::url(Auth::user()->image) }}" alt="User Image" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/img/user_default.png') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info ml-2">
                <a href="{{ route('profile.index', encrypt(Auth::user()->id)) }}" class="d-block">{{ Auth::user()->name }}</a>
                <span class="text-xs"><i class="fa fa-circle text-success"></i> Online</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->level_id == 5)
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="{{ route('pendaftaran.index') }}" class="nav-link @yield('pendaftaran')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>pendaftaran SP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pendaftaran.status') }}" class="nav-link @yield('status')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>Status Pendaftaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftartugas.index', auth()->user()->id) }}" class="nav-link @yield('tugas')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>Tugas Dosen</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->level_id == 4)
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="{{ route('verifikasi.index') }}" class="nav-link @yield('verifikasi')">
                            <i class="nav-icon ion ion-person-stalker"></i>
                            <p>Mahasiswa Pengajuan SP</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->level_id == 3)
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="{{ route('mahasiswa.index') }}" class="nav-link @yield('datamahasiswasp')">
                            <i class="nav-icon ion ion-person-stalker"></i>
                            <p>Mahasiswa SP</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->level_id == 2)
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="{{ route('verifikasi.mahasiswa') }}" class="nav-link @yield('verifikasimahasiswa')">
                            <i class="nav-icon ion ion-person-stalker"></i>
                            <p>Mahasiswa Pengajuan SP</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->level_id == 1)
                    <li class="nav-header">Admin</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link @yield('admin')">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dosen.index') }}" class="nav-link @yield('dosen')">
                            <i class="nav-icon ion ion-person-stalker"></i>
                            <p>Dosen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('matkul.index') }}" class="nav-link @yield('matkul')">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>Matkul</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pengajuan.index') }}" class="nav-link @yield('pengajuan')">
                            <i class="nav-icon ion ion-compose"></i>
                            <p>Pengajuan</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
