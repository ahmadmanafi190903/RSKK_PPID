@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 d-flex justify-content-between">
            <h1 class="m-0">Berita</h1>
            @if (Auth::user()->role == 'super_admin')
              <a href="/berita/create" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i></a>
            @endif
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Berita</h3>

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
                    <th class="align-middle">Image</th>
                    <th class="align-middle">Judul</th>
                    <th class="align-middle">Deskripsi</th>
                    <th class="align-middle">Url</th>
                    @if (Auth::user()->role == 'super_admin')
                      <th class="align-middle">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody id="contentArea">
                  @foreach ($news as $item)
                    <tr>
                      <td class="align-middle">{{ $loop->iteration }}</td>
                      <td class="align-middle">
                        <img src="/storage/{{ $item->image }}" alt="{{ $item->image }}" class="w-100">
                      </td>
                      <td class="align-middle">{{ $item->judul }}</td>
                      <td class="align-middle">{{ $item->deskripsi }}</td>
                      <td class="align-middle">
                        <a href="{{ $item->url }}" class="btn btn-primary" target="_black">
                          <i class="nav-icon fas fa-download"></i>
                        </a>
                      </td>
                      <td class="align-middle">
                        @if (Auth::user()->role == 'super_admin')
                          <a href="berita/{{ $item->id }}" class="btn btn-warning my-1">
                            <i class="nav-icon fas fa-pencil"></i>
                          </a>
                          <form action="berita/{{ $item->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                              <i class="nav-icon fas fa-trash"></i>
                            </button>
                          </form>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{ $news->links('pagination::bootstrap-5') }}
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection