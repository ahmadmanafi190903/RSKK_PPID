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
      <form action="/admin/pengajuan_keberatan/{{ $information->id }}" method="post" enctype="multipart/form-data">
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
                  <input class="w-100 form-control" type="text" value="{{ $information->nama }} {{ old('nama') }}" id="nama_lengkap" name="nama">
                  @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="email">
                    <h5 class="mb-0">Email</h5>
                  </label>
                  <input class="w-100 form-control" type="email" value="{{ $information->email }}" id="email" name="email">
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="phone">
                    <h5 class="mb-0">Telepon</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $information->no_telepon }}" id="phone" name="no_telepon" inputmode="numeric" oninput="inputPhone()">
                  @error('no_telepon')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="pekerjaan">
                    <h5 class="mb-0">Pekerjaan</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $information->pekerjaan }}" id="pekerjaan" name="pekerjaan">
                  @error('pekerjaan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label  for="alamat">
                    <h5 class="mb-0">Alamat</h5>
                  </label>
                  <textarea class="w-100 form-control" name="alamat"  cols="30" id="alamat">{{ $information->alamat }}</textarea>
                  @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="nik">
                    <h5 class="mb-0">Nik</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ $information->nik }}" id="nik" name="nik" inputmode="numeric" oninput="inputNik()">
                  @error('nik')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="fktp">
                    <h5 class="mb-0">Foto Ktp</h5>
                  </label>
                  <div> 
                    <img src="{{ asset('storage/'.$information->file_ktp) }}" alt="{{ $information->file_ktp }}" width="200px">
                  </div>
                  <input class="w-100 form-control" type="file" id="fktp" name="file_ktp">
                  @error('file_ktp')
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
                  <h4>Detail Permohonan</h4>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <label for="informasi">
                    <h5 class="mb-0">Informasi yang dibutuhkan</h5>
                  </label>
                  <textarea class="w-100 form-control" name="informasi_yang_dibutuhkan" id="informasi" cols="30">{{ $information->informasi_yang_dibutuhkan }}</textarea>
                  @error('informasi_yang_dibutuhkan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="alasan">
                    <h5 class="mb-0">Alasan pengguna Informasi</h5>
                  </label>
                  <textarea class="w-100 form-control" name="alasan_penggunaan_informasi" id="alasan" cols="30">{{ $information->alasan_penggunaan_informasi }}</textarea>
                  @error('alasan_penggunaan_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="memperoleh">
                    <h5 class="mb-0">Memperoleh informaasi</h5>
                  </label>
                  <select id="memperoleh" name="id_memperoleh_informasi" class="w-100 form-control">
                    <option value=""></option>
                    @foreach ($get_information as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $information->id_memperoleh_informasi ?'selected' : '' }}>{{ $item->memperoleh_informasi }}</option>
                    @endforeach
                  </select>
                  @error('id_memperoleh_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="Mendapatkan">
                    <h5 class="mb-0">Mendapatkan salinan informasi</h5>
                  </label>
                  <select id="Mendapatkan" name="id_mendapatkan_salinan_informasi" class="w-100 form-control">
                    <option value=""></option> 
                    @foreach ($get_copy as $item)        
                     <option value="{{ $item->id }}" {{ $item->id == $information->id_mendapatkan_salinan_informasi ?'selected' : '' }}>{{ $item->mendapatkan_salinan_informasi }}</option>
                    @endforeach
                  </select>
                  @error('id_mendapatkan_salinan_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <a href="/admin/permohonan_informasi" class="btn btn-secondary">kembali</a>
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