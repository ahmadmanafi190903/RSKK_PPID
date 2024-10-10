@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengajuan Keberatan</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>Biodata</h4>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <div>
                <h5 class="mb-0">Nama Lengkap</h5>
                <p>{{ $item->nama }}</p>
              </div>
              <div>
                <h5 class="mb-0">Email</h5>
                <p>{{ $item->email }}</p>
              </div>
              <div>
                <h5 class="mb-0">Telepon</h5>
                <p>{{ $item->no_telepon }}</p>
              </div>
              <div>
                <h5 class="mb-0">Pekerjaan</h5>
                <p>{{ $item->pekerjaan }}</p>
              </div>
              <div>
                <h5 class="mb-0">Alamat</h5>
                <p>{{ $item->alamat }}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>Detail Pengajuan</h4>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <div>
                <h5 class="mb-0">Tujuan Informasi</h5>
                <p>{{ $item->tujuan_penggunaan_informasi }}</p>
              </div>
              <div>
                <h5 class="mb-0">Alasan Pengajuan</h5>
                <p>{{ $item->pengajuan->nama }}</p>
              </div>
              <div>
                <h5 class="mb-0">Tanggal Permohonan</h5>
                <p>{{ $item->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}</p>
              </div>
              @if ($item->status_id == 3)
                <div class="alert alert-primary text-uppercase text-center">Status {{ $item->status->status }}</div>
              @elseif ($item->status_id == 0)
                <div class="alert alert-danger text-uppercase text-center">Status {{ $item->status->status }}</div>
              @elseif ($item->status_id == 1)
                <div class="alert alert-success text-uppercase text-center">Status {{ $item->status->status }}
                </div>
              @endif

              @if ($item->status_id == 3)
                @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                  <form action="/pengajuan_keberatan/{{ $item->id }}/tolak" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger"
                      onclick="return confirm('Apakah anda yakin ingin menolak pengajuan ini?')">
                      Tolak <i class="nav-icon fas fa-window-close"></i>
                    </button>
                  </form>
                  <form action="/pengajuan_keberatan/{{ $item->id }}/terima" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success"
                      onclick="return confirm('Apakah anda yakin ingin menerima pengajuan ini?')">Terima <i
                        class="nav-icon fas fa-check"></i></button>
                  </form>
                @endif
              {{-- @elseif ($item->status_id == 0)
                @if ($item->pesan_ditolak)
                  <div>
                    <h5 class="mb-0">Alasan Ditolak</h5>
                    <p>{{ $item->pesan_ditolak }}</p>
                  </div>
                @endif --}}
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
