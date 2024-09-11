@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 d-flex justify-content-between">
            <h1 class="m-0">Informasi Public</h1>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addUser"><i class="nav-icon fas fa-plus"></i></a>
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
                  <input type="text" name="table_search" class="form-control float-right" id="searchInput" placeholder="Cari">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-default" >
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
                    <th class="align-middle">Action</th>
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
                        <a href="{{ asset('storage/' . $item->link) }}" target="_blank">
                          <i class="nav-icon fas fa-download"></i>
                        </a>
                      </td>
                      <td class="align-middle">
                        <div class="">
                          {{-- <a href="#" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a> --}}
                          <a href="#" class="btn btn-warning my-1"><i class="nav-icon fas fa-pencil"></i></a>
                          <form action="#" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="nav-icon fas fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>  
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
