@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Informasi Publik</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="/admin/informasi_publik/{{ $info_public->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <label for="ringkasan_informasi">
                    <h5 class="mb-0">Ringkasan</h5>
                  </label>
                  <textarea class="w-100 form-control" name="ringkasan_informasi" cols="30" id="ringkasan_informasi">{{ old('ringkasan_informasi') }}{{ $info_public->ringkasan_informasi }}</textarea>
                  @error('ringkasan_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="pejabat_penguasa_informasi">
                    <h5 class="mb-0">Pejabat Penguasa Informasi</h5>
                  </label>
                  <input class="w-100 form-control" type="text"
                    value="{{ old('pejabat_penguasa_informasi') }}{{ $info_public->pejabat_penguasa_informasi }}"
                    id="pejabat_penguasa_informasi" name="pejabat_penguasa_informasi">
                  @error('pejabat_penguasa_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="penanggung_jawab_informasi">
                    <h5 class="mb-0">Penanggung Jawab Informasi</h5>
                  </label>
                  <input class="w-100 form-control" type="text"
                    value="{{ old('penanggung_jawab_informasi') }}{{ $info_public->penanggung_jawab_informasi }}"
                    id="penanggung_jawab_informasi" name="penanggung_jawab_informasi">
                  @error('penanggung_jawab_informasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="pekerjaan">
                    <h5 class="mb-0">Apakah Informasi berbentuk cetak?</h5>
                  </label>
                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="cetak_ya" name="bentuk_informasi_cetak"
                        value="1" {{ old('bentuk_informasi_cetak') == '1' ? 'checked' : '' }}
                        {{ $info_public->bentuk_informasi_cetak == '1' ? 'checked' : '' }}>
                      <label for="cetak_ya" class="custom-control-label form-check-label">Ya</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="cetak_tidak" name="bentuk_informasi_cetak"
                        value="0" {{ old('bentuk_informasi_cetak') == '0' ? 'checked' : '' }}
                        {{ $info_public->bentuk_informasi_cetak == '0' ? 'checked' : '' }}>
                      <label for="cetak_tidak" class="custom-control-label form-check-label">Tidak</label>
                    </div>
                  </div>
                  @error('bentuk_informasi_cetak')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="pekerjaan">
                    <h5 class="mb-0">Apakah Informasi berbentuk digital?</h5>
                  </label>
                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="digital_ya" name="bentuk_informasi_digital"
                        value="1" {{ old('bentuk_informasi_digital') == '1' ? 'checked' : '' }}
                        {{ $info_public->bentuk_informasi_digital == '1' ? 'checked' : '' }}>
                      <label for="digital_ya" class="custom-control-label form-check-label">Ya</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="digital_tidak"
                        name="bentuk_informasi_digital" value="0"
                        {{ old('bentuk_informasi_digital') == '0' ? 'checked' : '' }}
                        {{ $info_public->bentuk_informasi_digital == '0' ? 'checked' : '' }}>
                      <label for="digital_tidak" class="custom-control-label form-check-label">Tidak</label>
                    </div>
                  </div>
                  @error('bentuk_informasi_digital')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <label for="jangka_waktu_penyimpanan">
                    <h5 class="mb-0">Jangka waktu penyimpanan</h5>
                  </label>
                  <input class="w-100 form-control" type="text"
                    value="{{ old('jangka_waktu_penyimpanan') }}{{ $info_public->jangka_waktu_penyimpanan }}"
                    id="jangka_waktu_penyimpanan" name="jangka_waktu_penyimpanan">
                  @error('jangka_waktu_penyimpanan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="memperoleh">
                    <h5 class="mb-0">Kategori</h5>
                  </label>
                  <select class="custom-select" id="kategori_id" name="kategori_id">
                    <option></option>
                    @foreach ($categories as $item)
                      <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}
                        {{ $item->id }}" {{ $item->id == $info_public->kategori_id ? 'selected' : '' }}>
                        {{ $item->kategori }}</option>
                    @endforeach
                  </select>
                  @error('kategori_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="link">
                    <h5 class="mb-0">Link</h5>
                  </label>
                  <div class="mb-1">
                    <a href="{{ asset('storage/' . $info_public->link) }}" target="_blank">Lihat File Sebelumnya</a>
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="link" name="link">
                      <label class="custom-file-label" for="link">{{ $info_public->link }}</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <a href="/admin/informasi_publik" class="btn btn-secondary">kembali</a>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
@endsection

<img src="foto.jpg" alt="">
<input type="file" name="" id="">