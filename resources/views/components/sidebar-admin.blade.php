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
        <img src="/assets/img/pp_rating.webp" class="img-circle elevation-2" alt="User Image">
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
    <nav>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-header">MENU UTAMA</li>
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') || request()->is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/permohonan_informasi" class="nav-link {{ request()->is('permohonan_informasi') || request()->is('permohonan_informasi/*')  ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Permohonan Informasi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pengajuan_keberatan" class="nav-link {{ request()->is('pengajuan_keberatan') || request()->is('pengajuan_keberatan/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-engine-warning"></i>
            <p>
              Pengajuan Keberatan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/informasi_publik" class="nav-link {{ request()->is('informasi_publik') || request()->is('informasi_publik/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-user"></i>
            <p>
              Informasi Publik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/email" class="nav-link {{ request()->is('email') || request()->is('email/*') ? 'active' : '' }}">
            <i class="nav-icon far fa-envelope-open-text"></i>
            <p>
              Kirim Email
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/rating" class="nav-link {{ request()->is('rating') || request()->is('rating/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-star"></i>
            <p>
              Rating
            </p>
          </a>
        </li>
        {{-- <li class="nav-header">PENGGUNA</li> --}}
        <li class="nav-item">
          <a href="/pengguna" class="nav-link {{ request()->is('pengguna') || request()->is('pengguna/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-header">PROPERTIES</li>
        <li class="nav-item">
          <a href="/menu" class="nav-link {{ request()->is('menu') || request()->is('menu/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bars"></i>
            <p>Menu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/image_video" class="nav-link {{ request()->is('image_video') || request()->is('image/*') || request()->is('video/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-photo-video"></i>
            <p>Image dan Video</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/cards" class="nav-link {{ request()->is('cards') || request()->is('cards/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-credit-card-blank"></i>
            <p>Cards</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/info_banners" class="nav-link {{ request()->is('info_banners') || request()->is('info_banners/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-thumbtack"></i>
            <p>Informasi Banner</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/info_services" class="nav-link {{ request()->is('info_services') || request()->is('info_services/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-poll-people"></i>
            <p>Informasi Layanan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/quest_answer" class="nav-link {{ request()->is('quest_answer') || request()->is('quest_answer/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-question-square"></i>
            <p>Pertanyaan Jawaban</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/berita" class="nav-link {{ request()->is('berita') || request()->is('berita/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Berita
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/informasi" class="nav-link {{ request()->is('informasi') || request()->is('informasi/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>Informasi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/sosmed" class="nav-link {{ request()->is('sosmed') || request()->is('sosmed/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-thumbs-up"></i>
            <p>Sosial Media</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/kontak" class="nav-link {{ request()->is('kontak') || request()->is('kontak/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-phone-alt"></i>
            <p>Kontak</p>
          </a>
        </li>
        <li class="nav-item mb-5">
          <a href="/lokasi" class="nav-link {{ request()->is('lokasi') || request()->is('lokasi/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marked"></i>
            <p>Lokasi</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
