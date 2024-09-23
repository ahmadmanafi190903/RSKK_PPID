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
                <p>{{ $submission->nama }}</p>
              </div>
              <div>
                <h5 class="mb-0">Email</h5>
                <p>{{ $submission->email }}</p>
              </div>
              <div>
                <h5 class="mb-0">Telepon</h5>
                <p>{{ $submission->no_telepon }}</p>
              </div>
              <div>
                <h5 class="mb-0">Pekerjaan</h5>
                <p>{{ $submission->pekerjaan }}</p>
              </div>
              <div>
                <h5 class="mb-0">Alamat</h5>
                <p>{{ $submission->alamat }}</p>
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
                <h5 class="mb-0">tujuan informasi </h5>
                <p>{{ $submission->tujuan_penggunaan_informasi }}</p>
              </div>
              <div>
                <h5 class="mb-0">Alasan Pengajuan</h5>
                <p>{{ $submission->alasan->alasan_pengajuan }}</p>
              </div>
              <div>
                <h5 class="mb-0">Tanggal Permohonan</h5>
                <p>{{ $submission->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}</p>
              </div>
              @if ($submission->id_status == 2)
                <div class="alert alert-primary text-uppercase text-center">Status {{ $submission->status->status }}</div>
              @elseif ($submission->id_status == 3)
                <div class="alert alert-danger text-uppercase text-center">Status {{ $submission->status->status }}</div>
              @elseif ($submission->id_status == 4)
                <div class="alert alert-success text-uppercase text-center">Status {{ $submission->status->status }}
                </div>
              @endif

              @if ($submission->id_status == 2)
                @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                  <form action="/pengajuan_keberatan/{{ $submission->id }}/tolak" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tolak">
                      Tolak <i class="nav-icon fas fa-window-close"></i>
                    </button>
                  </form>
                  <form action="/pengajuan_keberatan/{{ $submission->id }}/terima" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success"
                      onclick="return confirm('Apakah anda yakin ingin menerima permohonan ini?')">Terima <i
                        class="nav-icon fas fa-check"></i></button>
                  </form>
                @endif
              @elseif ($submission->id_status == 3)
                @if ($submission->pesan_ditolak)
                  <div>
                    <h5 class="mb-0">Alasan Ditolak</h5>
                    <p>{{ $submission->pesan_ditolak }}</p>
                  </div>
                @endif
              @endif

              {{-- @if ($submission->id_status == 4)
                @if ($submission->file_acc_pengajuan == null)
                  <div class="card-body table-responsive">
                    <div>
                      <form action="/pengajuan_keberatan/{{ $submission->id }}/terima" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div>
                          <h5 class="mb-2">File</h5>
                          <input type="file" name="file_acc_pengajuan" class="form-control mb-2">
                          @error('file_acc_pengajuan')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                      </form>
                    </div>
                  </div>
                @else
                  <div>
                    <h5 class="mb-0">File</h5>
                    <a href="{{ asset('storage/' . $submission->file_acc_permohonan) }}" target="_blank">
                      <img src="{{ asset('storage/' . $submission->file_acc_permohonan) }}"
                        alt="{{ $submission->file_acc_permohonan }}" width="250">
                    </a>
                  </div>
                @endif
              @endif --}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="tolak">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Alasan Pesan Ditolak</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/pengajuan_keberatan/{{ $submission->id }}/tolak" method="post">
          <div class="modal-body">
            @csrf
            @method('patch')
            <textarea name="pesan_ditolak" id="pesan_ditolak" class="form-control mb-2" placeholder="Masukkan alasan pesan ditolak"></textarea>
            @error('pesan_ditolak')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Tolak</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
