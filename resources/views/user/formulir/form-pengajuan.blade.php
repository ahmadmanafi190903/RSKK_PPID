@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row pt-5">
      <div class="col-12 col-xl-8 offset-xl-2 text-center">
        <div class="section-title">
          <h2>Formulir Pengajuan Informasi</h2>
        </div>
      </div>

      <div class="col-12 col-lg-12">
        <div class="contact-form">
          <form action="/pengajuan/create" class="row" id="contact-form" method="POST">
            @csrf
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" placeholder="Masukan Nama Lengkap" name="nama" value="{{ old('nama') }}">
                @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" placeholder="Masukan Alamat Email" name="email" value="{{ old('email') }}">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="phone">No Telepon</label>
                <input type="text" id="phone" placeholder="Masuk no telepon" name="no_telepon" value="{{ old('no_telepon') }}" oninput="inputPhone()">
                @error('no_telepon')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <label for="work">Pekerjaan</label>
                  <input type="text" id="work" placeholder="Masukan Pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                  @error('pekerjaan')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-0">
                <label for="address">Alamat</label>
                <textarea id="address" placeholder="Masukan Alamat" name="alamat" >{{ old('alamat') }}</textarea>
                @error('alamat')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="col-md-6 col-12">
              <div class="single-personal-info mb-0">
                <input type="text" placeholder="Masukan desa">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info mb-0">
                <input type="text" placeholder="Masukan kecamatan">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info mb-0">
                <input type="text" placeholder="Masukan kabupaten">
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="single-personal-info">
                <input type="text" placeholder="Masukan Provinsi">
              </div>
            </div>
            <div class="col-12">
              <div class="single-personal-info">
                <input type="text" inputmode="numeric" placeholder="Masukan kode POS">
              </div>
            </div> --}}
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-0">
                <label for="information1">Tujuan Penggunaan Informasi</label>
                <textarea id="information1" placeholder="Masukan Tujuan Penggunaan Informasi" name="tujuan_penggunaan_informasi">{{ old('tujuan_penggunaan_informasi')}}</textarea>
                @error('tujuan_penggunaan_informasi')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="single-personal-info mb-5">
                <label for="information2">Alasan Pengajuan Keberatan</label>
                <select id="kuasa" name="id_alasan_pengajuan">
                {{-- onchange="toggleForm()" --}}
                >
                  <option></option>
                  @foreach ($reason as $item)
                    <option value="{{ $item->id }}" {{ old('id_alasan_pengajuan') == $item->id ? 'selected' : '' }}>{{ $item->alasan_pengajuan }}</option>
                  @endforeach
                </select>
                @error('id_alasan_pengajuan')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="col-12">
              <div class="single-personal-info">
                <label for="kuasa">Kuasa</label>
                <select id="kuasa" onchange="toggleForm()">
                  <option selected>-- Pilih salah satu menu --</option>
                  <option value="1">Permohonan tidak dikuasai</option>
                  <option value="2">Permohonan dikuasai kepada</option>
                </select>
              </div>
            </div> --}}
            {{-- <div id="hiddenForm" class="col-12" style="display: none;">
              <h3>Identitas Kuasa Pemohon</h3>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" placeholder="Masukan Nama Lengkap">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" placeholder="Masukan Alamat Email">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="phone">No Telepon</label>
                    <input type="text" id="phone" placeholder="Masuk no telepon">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="work">Pekerjaan</label>
                    <input type="text" id="work" placeholder="Masukan Pekerjaan">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan desa">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan kecamatan">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan kabupaten">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <input type="text" placeholder="Masukan Provinsi">
                  </div>
                </div>
                <div class="col-12">
                  <div class="single-personal-info">
                    <input type="text" inputmode="numeric" placeholder="Masukan kode POS">
                  </div>
                </div>
                <div class="col-md-12 col-12">
                  <div class="single-personal-info mb-0">
                    <label for="address">Alamat</label>
                    <textarea id="address" placeholder="Masukan Alamat"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan desa">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan kecamatan">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info mb-0">
                    <input type="text" placeholder="Masukan kabupaten">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <input type="text" placeholder="Masukan Provinsi">
                  </div>
                </div>
                <div class="col-12">
                  <div class="single-personal-info">
                    <input type="text" inputmode="numeric" placeholder="Masukan kode POS">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="single-personal-info">
                    <label for="formFile" class="form-label">Upload Surat kuasa(pdf)</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
              </div>

            </div> --}}
            <div class="col-md-12 col-12 text-center">
              <input class="submit-btn mb-5" type="submit" value="Kirim" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection