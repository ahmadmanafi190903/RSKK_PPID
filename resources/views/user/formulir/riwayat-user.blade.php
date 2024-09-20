@extends('layouts.app')

@section('content')
  <div class="col-12 col-lg-6 offset-lg-3 pt-5 mt-5 mb-5 ">
    <div class="main-sidebar">
      <div class="single-sidebar-widget ">
        <div class="text-center">
          <h3>Cari Permohonan</h3>
        </div>
        <div class="search_widget">
          <form action="{{ route('riwayat') }}" method="get">
            <input type="email" name="email" placeholder="Masukan Email ..." value="{{ request('email') }}">
            <button type="submit"><i class="fal fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container mb-5">
    <div class="accordion" id="accordionExample">
      @if ($information)
        @foreach ($information as $key => $item)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed text-black" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $key }}" aria-expanded="false"
                aria-controls="collapse{{ $key }}">
                {{ $key + 1 }} {{ Str::limit($item->informasi_yang_dibutuhkan, 50, '...') }}
              </button>
            </h2>
            <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                      <div class="mb-3">
                        <h5 class="mb-0">Nama Lengkap</h5>
                        <p>{{ $item->nama }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Email</h5>
                        <p>{{ $item->email }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Telepon</h5>
                        <p>{{ $item->telepon }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Pekerjaan</h5>
                        <p>{{ $item->pekerjaan }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Alamat</h5>
                        <p>{{ $item->alamat }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Nik</h5>
                        <p>{{ $item->nik }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Foto KTP</h5>
                        <img src="{{ asset('storage/' . $item->file_ktp) }}" alt="{{ $item->file_ktp }}" width="250">
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
                      <div class="mb-3">
                        <h5 class="mb-0">Informasi Yang Dibutuhkan</h5>
                        <p>{{ $item->informasi_yang_dibutuhkan }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Alassan Penggunaan Informasi</h5>
                        <p> {{ $item->alasan_penggunaan_informasi }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Memperoleh Informasi</h5>
                        <p>{{ $item->memperolehinformasi->memperoleh_informasi }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Mendapatkan Salinan Informasi</h5>
                        <p>{{ $item->mendapatkansalinaninformasi->mendapatkan_salinan_informasi }}</p>
                      </div>
                      <div class="mb-3">
                        <h5 class="mb-0">Tanggal Permohonan</h5>
                        <p>{{ $item->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}</p>
                      </div>

                      @if ($item->id_status == 1)
                        <div class="alert alert-secondary text-uppercase text-center">Status {{ $item->status->status }}
                        </div>
                      @elseif ($item->id_status == 2)
                        <div class="alert alert-primary text-uppercase text-center">Status {{ $item->status->status }}
                        </div>
                      @elseif ($item->id_status == 3)
                        <div class="alert alert-danger text-uppercase text-center">Status {{ $item->status->status }}
                        </div>
                      @elseif ($item->id_status == 4)
                        <div class="alert alert-success text-uppercase text-center">Status {{ $item->status->status }}
                        </div>
                      @endif

                      @if ($item->id_status == 3)
                        <div class="mb-3">
                          <h5 class="mb-0">Alasan Ditolak</h5>
                          <p>{{ $item->pesan_ditolak }}</p>
                        </div>
                      @elseif ($item->id_status == 4)
                        @if ($item->file_acc_permohonan)
                          <div class="mb-3">
                            <h5 class="mb-0">Pesan Diterima</h5>
                            <a href="{{ asset('storage/' . $item->file_acc_permohonan) }}" target="_blank">click link: {{  $item->file_acc_permohonan }}</a>
                          </div>
                        @endif
                      @endif

                      

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        {{-- @elseif($information == null)
        <div class="error-content text-center">
          <img class="mb-5" src="{{ asset('assets/img/404.png') }}" alt="not found">
          <h2>Oops! data yang anda cari tidak ditemukan</h2>
        </div> --}}
      @endif
    </div>
  </div>

  
@endsection
