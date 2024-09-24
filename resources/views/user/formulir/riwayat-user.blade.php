@extends('layouts.app')

@section('content')

<div class="section-title text-center pt-5">
  <h2>Riwayat Permohonan Informasi</h2>
</div>

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
                {{ $key + 1 }}. {{ Str::limit($item->informasi_yang_dibutuhkan, 50, '...') }}
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
                        <p>{{ substr_replace($item->no_telepon, str_repeat('*', strlen($item->no_telepon) - 8), 4, strlen($item->no_telepon) - 8) }}</p>
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
                        <h5 class="mb-0">NIK</h5>
                        <p>{{ substr_replace($item->nik, str_repeat('*', strlen($item->nik) - 8), 4, strlen($item->nik) - 8) }}</p>
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
                        <h5 class="mb-0">Alasan Penggunaan Informasi</h5>
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

                      <div class="ms-3">
                        <ul class="timeline-list">
                          <li class="circle @if ($item->id_status) active @endif">
                            <div class="content ">
                              <h4>Terkirim</h4>
                              <p>
                                Permohonan informasi telah berhasil dikirim dan diterima oleh PPID. Verifikasi data pemohon sedang dilakukan
                                untuk memulai proses.
                              </p>
                            </div>
                          </li>
                          <li class="circle @if ($item->id_status != 1) active @endif">
                            <div class="content">
                              <h4>Diproses</h4>
                              <p>
                                PPID sedang meninjau permohonan dan memverifikasi informasi yang dapat diberikan. Jika diperlukan, klarifikasi
                                tambahan akan dilakukan.
                              </p>
                            </div>
                          </li>
                          <li class="circle @if ($item->id_status == 3 || $item->id_status == 4) active @endif">
                            <div class="content">
                              <h4>Selesai</h4>
                              <p>
                                Proses permohonan telah selesai, dan informasi yang diminta sudah disiapkan. Pemohon akan segera menerima hasil sesuai dengan ketentuan.
                              </p>
                            </div>
                          </li>
                        </ul>
                      </div>
                      

                      @if ($item->id_status == 3)
                        <div class="mb-3">
                          <h5 class="mb-0">Alasan Ditolak</h5>
                          <p>{{ $item->pesan_ditolak }}</p>
                        </div>
                      @elseif ($item->id_status == 4)
                        @if ($item->file_acc_permohonan)
                          <div class="mb-3">
                            <h5 class="mb-0">Pesan Diterima</h5>
                            <a href="{{ asset('storage/' . $item->file_acc_permohonan) }}" target="_blank" class="btn btn-primary">Lihat</a>
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
