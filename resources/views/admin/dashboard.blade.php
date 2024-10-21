@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- 4 card -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $information->count() }}</h3>

                <p>Jumlah Permohonan Informasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-alt"></i>
              </div>
              <a href="/permohonan_informasi" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $submission->count() }}</h3>

                <p>Jumlah Pengajuan keberatan</p>
              </div>
              <div class="icon">
                <i class="fas fa-engine-warning"></i>
              </div>
              <a href="/pengajuan_keberatan" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $public->count() }}</h3>

                <p>Jumlah Informasi Publik</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-user"></i>
              </div>
              <a href="/informasi_publik" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $averageRating }}</h3>

                <p>Rata rata Rating</p>
              </div>
              <div class="icon">
                <i class="fas fa-star"></i>
              </div>
              <a href="/rating" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- end 4 card -->

        <div class="row">
          {{-- layout kiri --}}
          <div class="col-lg-6">
            {{-- grafik permohonan dan pengajuan --}}
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grafik Permohonan dan Pengajuan</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">

                <div class="position-relative mb-4">
                  <canvas id="grafikPermohonanPengajuan" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Permohonan
                  </span>

                  <span>
                    <i class="fas fa-square text-success"></i> Pengajuan
                  </span>
                </div>
              </div>
            </div>

            {{-- jumlah permohonan informasi berdasarkan kategori --}}
            <div>
              <!-- belum dibuka -->
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-lock-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Belum Dibuka</span>
                  <span class="info-box-number">{{ $dikirim }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>

              <!-- proses -->
              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fad fa-spinner-third"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Proses</span>
                  <span class="info-box-number">{{ $proses }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>

              <!-- tolak -->
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-vote-nay"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Tolak</span>
                  <span class="info-box-number">{{ $ditolak }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>

              <!-- terima -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-vote-yea"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Terima</span>
                  <span class="info-box-number">{{ $diterima }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

          </div>

          {{-- layout kanan --}}
          <div class="col-lg-6">
            {{-- grafik informasi publik --}}
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grafik Informasi Publik</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">

                <div class="position-relative mb-4">
                  <canvas id="grafikInformasiPublik" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Berkala
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-square text-success"></i> Serta Merta
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-square text-warning"></i> Setiap Saat
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-square text-danger"></i> Dikeculaikan
                  </span>
                </div>
              </div>
            </div>

            {{-- ulasan terbaru --}}
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Ulasan Terbaru</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Bintang</th>
                      <th>ulasan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($newComments as $item)
                      <tr>
                        <td>{{ $item->pemohon->nama }}</td>
                        <td>
                          @for ($i = 0; $i < $item->star; $i++)
                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                          @endfor
                        </td>
                        <td>{{ $item->comment }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
@endsection
