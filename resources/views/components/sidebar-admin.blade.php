<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="/assets/img/icons/Logo-RSKK-2.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">PPID RSKK</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dist/img/33.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
          aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-header">MENU UTAMA</li>
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/permohonan_informasi" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Permohonan Informasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pengajuan_keberatan" class="nav-link">
            <i class="nav-icon fas fa-engine-warning"></i>
            <p>
              Pengajuan Keberatan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/informasi_publik" class="nav-link">
            <i class="nav-icon fas fa-triangle"></i>
            <p>
              Informasi Publik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/email" class="nav-link">
            <i class="nav-icon fas fa-mail-bulk"></i>
            <p>
              Kirim Email
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/rating" class="nav-link">
            <i class="nav-icon fas fa-star"></i>
            <p>
              Rating
            </p>
          </a>
        </li>
        <li class="nav-header">PENGGUNA</li>
        <li class="nav-item">
          <a href="/pengguna" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-header">KONFIGURASI</li>
        <li class="nav-item">
          <a href="/menu" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Menu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/submenu" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Sub Menu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/image/logo" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Image Logo</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/image" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Image Carousel</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/image" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Image Thumbnail</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/image" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>Image Q&A</p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Pemohon</p>
          </a>
        </li> --}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>