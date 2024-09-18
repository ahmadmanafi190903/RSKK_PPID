@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 d-flex justify-content-between">
            <h1 class="m-0">Informasi Public</h1>
            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'operator')
              <a href="/informasi_publik/create" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i></a>
            @endif
          </div>
        </div><!-- /.row -->
        @if (session('success'))
          <div class="alert alert-success ">
            {{ session('success') }}
          </div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Informasi Public</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" id="searchInput"
                    placeholder="Cari">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
                <thead>
                  <tr class="text-center">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Ringkasan</th>
                    <th class="align-middle">Pejabat</th>
                    <th class="align-middle">Penanggung Jawab</th>
                    <th class="align-middle">Bentuk Informasi Cetak</th>
                    <th class="align-middle">Bentuk Informasi Digital</th>
                    <th class="align-middle">Jangka Waktu</th>
                    <th class="align-middle">Kategori</th>
                    <th class="align-middle">Link</th>
                    @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'operator')
                      <th class="align-middle">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody id="contentArea">
                  @foreach ($information_public as $item)
                    <tr>
                      <td class="align-middle">{{ $loop->iteration }}</td>
                      <td class="align-middle">{{ $item->ringkasan_informasi }}</td>
                      <td class="align-middle">{{ $item->pejabat_penguasa_informasi }}</td>
                      <td class="align-middle">{{ $item->penanggung_jawab_informasi }}</td>
                      <td class="align-middle">
                        @if ($item->bentuk_informasi_cetak == 1)
                          <i class="nav-icon fas fa-check"></i>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if ($item->bentuk_informasi_digital == 1)
                          <i class="nav-icon fas fa-check"></i>
                        @endif
                      </td>
                      <td class="align-middle">{{ $item->jangka_waktu_penyimpanan }}</td>
                      <td class="align-middle">{{ $item->kategori->kategori }}</td>
                      <td class="align-middle">
                        <button type="button" class="btn btn-info" data-toggle="modal"
                          data-target="#modal-xl{{ $item->id }}">
                          <i class="nav-icon fas fa-download"></i>
                        </button>
                      </td>
                      <td class="align-middle">
                        <div class="">
                          {{-- <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a> --}}
                          @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'operator')
                            <a href="/informasi_publik/{{ $item->id }}" class="btn btn-warning my-1"><i
                                class="nav-icon fas fa-pencil"></i></a>
                            <form action="/informasi_publik/{{ $item->id }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i
                                  class="nav-icon fas fa-trash"></i></button>
                            </form>
                          @endif
                        </div>
                      </td>
                    </tr>

                    {{-- modal --}}
                    <div class="modal fade" id="modal-xl{{ $item->id }}">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            {{-- <h4 class="modal-title">Extra Large Modal</h4> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <iframe id="pdfViewer" src="{{ asset('storage/' . $item->link) }}" frameborder="0"
                            style="width: 100%; height: 600px;"></iframe>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{ $information_public->links('pagination::bootstrap-5') }}
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
