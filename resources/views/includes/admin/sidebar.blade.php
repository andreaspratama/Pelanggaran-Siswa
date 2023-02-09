<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">YSKI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (auth()->user()->role == 'admin')
                    <a class="collapse-item" href="{{route('siswa.index')}}">Siswa</a>
                    <a class="collapse-item" href="{{route('unit.index')}}">Unit</a>
                    <a class="collapse-item" href="{{route('kelas.index')}}">Kelas</a>
                    <a class="collapse-item" href="{{route('subkelas.index')}}">Sub Kelas</a>
                    <a class="collapse-item" href="{{route('jnspelang.index')}}">Jenis Pelanggaran</a>
                    <a class="collapse-item" href="{{route('wk.index')}}">Wali Kelas</a>
                    <a class="collapse-item" href="{{route('gb.index')}}">Guru BK</a>
                    <a class="collapse-item" href="{{route('datadiriIndex')}}">Data Diri</a>
                    <a class="collapse-item" href="{{route('kelCreate')}}">Kel</a>
                @endif
                @if (auth()->user()->role == 'guru')
                    <a class="collapse-item" href="{{route('pelanggaran.create')}}">Input Pelanggaran</a>
                    <a class="collapse-item" href="{{route('pelanggaran.index')}}">List Pelanggaran</a>
                    <a class="collapse-item" href="{{route('pelanggaranSortir')}}">List Pelanggaran Siswa</a>
                @endif
                {{-- <a class="collapse-item" href="{{route('coba.index')}}">Coba</a> --}}
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->