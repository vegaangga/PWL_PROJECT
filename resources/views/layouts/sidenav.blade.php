<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('siswa.index')}}">
        <div class="sidebar-brand-icon ">
            <img src="{{asset('homepage/img/logocastle.png')}}" style="width: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">SMAN1Puri</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    @php $a = Auth::user()->level ; @endphp
    @if($a == 1)
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Calon Siswa
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('siswa.profile')}}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Profile User</span>
        </a>
        @php
        $a = Auth::user()->id;
        $b = App\Models\Biaya::where('user_id', $a)->first();
        // $b = App\Models\Biaya::where('user_id', $a)->where('status','sudah')->first();/
        $c= App\Models\Siswa::where('id', $a)->first();
        @endphp
        @if($b == null)
        <a class="nav-link collapsed" href="{{route('biaya.index')}}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Formulir</span>
        </a>
        @endif


        <a class="nav-link collapsed" href="{{route('siswa.show',Auth::user()->nisn)}}"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Tersimpan</span>
        </a>

    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif

    @if($a == 0)
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">

        <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pendaftaran</span>
        </a>
        <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pribadi Calon Siswa</span>
        </a>
        <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Daftar Ulang</span>
        </a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="admin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="register.html">Data User Terdaftar</a>
                <a class="collapse-item" href="forgot-password.html">Data Admin</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="#">Cetak Data</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>