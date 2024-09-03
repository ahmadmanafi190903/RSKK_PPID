@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="row pt-5">
      <div class="col-12 col-xl-8 offset-xl-2 text-center">
        <div class="section-title">
          <h2>Formulir Permohonan Informasi</h2>
        </div>
      </div>

      <div class="col-12 col-lg-12">
        <div class="contact-form">
          <form action="/permohonan/create" method="POST" class="row" id="contact-form" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="nama" placeholder="Masukan Nama Lengkap" value="{{ old('nama') }}">
                @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukan Alamat Email" value="{{ old('email') }}">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="phone">No Telepon</label>
                <input type="text" id="phone" name="no_telepon" placeholder="Masuk no telepon" inputmode="numeric" value="{{ old('no_telepon') }}" oninput="inputPhone()">
                @error('no_telepon')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="work">Pekerjaan</label>
                <input type="text" id="work" name="pekerjaan" placeholder="Masukan Pekerjaan" value="{{ old('pekerjaan') }}">
                @error('pekerjaan')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-0">
                <label for="address">Alamat</label>
                <textarea id="address" name="alamat" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea >
                @error('alamat')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" placeholder="Masukan identitas" value="{{ old('nik') }}" inputmode="numeric" oninput="inputNik()" >
                @error('nik')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="formFile" class="form-label">Upload KTP</label>
                <input class="form-control" name="file_ktp" type="file" id="formFile" value="{{ old('file_ktp') }}">
                @error('file_ktp')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-0">
                <label for="information1">Informasi Yang Dibutuhkan</label>
                <textarea id="information1" name="informasi_yang_dibutuhkan" placeholder="Masukan Informasi yang dibutuhkan" >{{ old('informasi_yang_dibutuhkan') }}</textarea>
                @error('informasi_yang_dibutuhkan')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-0">
                <label for="information2">Alasan Penggunaan Informasi</label>
                <textarea id="information2" name="alasan_penggunaan_informasi" placeholder="Masukan Alasan Pengguna Informasi">{{ old('alasan_penggunaan_informasi') }}</textarea>
                @error('alasan_penggunaan_informasi')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="information3">cara memperoleh informasi</label>
                <select id="information3" name="id_memperoleh_informasi">
                  <option value=""></option>
                  @foreach ($get_information as $item)
                    <option value="{{ $item->id }}" {{ old('id_memperoleh_informasi') == $item->id ? 'selected' : '' }}>{{ $item->memperoleh_informasi }}</option>
                  @endforeach
                </select>
                @error('id_memperoleh_informasi')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="information4">cara mendapat informasi</label>
                <select id="information4" name="id_mendapatkan_salinan_informasi">
                  <option></option>
                  @foreach ($get_copy as $item)
                    <option value="{{ $item->id }}" {{ old('id_mendapatkan_salinan_informasi') == $item->id ? 'selected' : '' }}>{{ $item->mendapatkan_salinan_informasi }}</option>
                  @endforeach
                </select>
                @error('id_mendapatkan_salinan_informasi')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
              </div>
            </div>
            <div class="col-md-12 col-12 text-center">
              <button class="submit-btn mb-5 mt-4" type="submit">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

