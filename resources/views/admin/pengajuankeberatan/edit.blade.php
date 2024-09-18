@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permohonan Informasi</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="/pengajuan_keberatan/{{ $submission->id }}" method="post">
        @csrf
        @method('PATCH')
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
                <div class="mb-4">
                  <label for="nama_lengkap">
                    <h5 class="mb-0">Nama Lengkap</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $submission->nama }} " id="nama_lengkap"
                    name="nama">
                  @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="email">
                    <h5 class="mb-0">Email</h5>
                  </label>
                  <input class="w-100 form-control" type="email" value="{{ $submission->email }}" id="email"
                    name="email">
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="phone">
                    <h5 class="mb-0">Telepon</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $submission->no_telepon }}" id="phone"
                    name="no_telepon" inputmode="numeric" oninput="inputPhone()">
                  @error('no_telepon')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="pekerjaan">
                    <h5 class="mb-0">Pekerjaan</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $submission->pekerjaan }}" id="pekerjaan"
                    name="pekerjaan">
                  @error('pekerjaan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="alamat">
                    <h5 class="mb-0">Alamat</h5>
                  </label>
                  <textarea class="w-100 form-control" name="alamat" cols="30" id="alamat">{{ $submission->alamat }}</textarea>
                  @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h4>Detail pengajuan keberatan</h4>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <label for="informasi">
                    <h5 class="mb-0">tujuan penggunaan informasi</h5>
                  </label>
                  <textarea class="w-100 form-control" name="tujuan_penggunaan_informasi" id="informasi" cols="30">{{ $submission->tujuan_penggunaan_informasi }}</textarea>
                  @error('tujuan_penggunaan_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="memperoleh">
                    <h5 class="mb-0">Alasan pengajuan keberatan</h5>
                  </label>
                  <select id="alasan" name="id_alasan_pengajuan" class="w-100 form-control">
                    <option value=""></option>
                    @foreach ($reason as $item)
                      <option value="{{ $item->id }}"
                        {{ $item->id == $submission->id_alasan_pengajuan ? 'selected' : '' }}>
                        {{ $item->alasan_pengajuan }}</option>
                    @endforeach
                  </select>
                  @error('id_alasan_pengajuan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <a href="/permohonan_informasi" class="btn btn-secondary">kembali</a>
                <button type="submit" class="btn btn-primary">update</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
