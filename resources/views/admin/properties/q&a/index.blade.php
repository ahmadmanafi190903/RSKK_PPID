@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 d-flex justify-content-between">
            <h1 class="m-0">Pertanyaan dan Jawaban</h1>
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
              <h3 class="card-title">Data Pertanyaan dan Jawaban</h3>
              <div class="card-tools">
                <form>
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="cari" class="form-control float-right" id="searchInput"
                      placeholder="Cari judul" value="{{ request('cari') }}">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
                <thead>
                  <tr class="text-center">
                    <th class="align-middle">No</th>
                    <th class="align-middle">Judul</th>
                    <th class="align-middle">Deskripsi</th>
                    @if (Auth::user()->role == 'super_admin')
                      <th class="align-middle">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody id="contentArea">
                  @foreach ($questAnswer as $item)
                    <tr>
                      <td class="align-middle">{{ $loop->iteration }}</td>
                      <td class="align-middle">{{ $item->judul }}</td>
                      <td class="text-left align-middle">{{ $item->deskripsi }}</td>
                      <td class="align-middle">
                        @if (Auth::user()->role == 'super_admin')
                          <a href="/quest_answer/{{ $item->id }}/edit" class="btn btn-warning my-1">
                            <i class="nav-icon fas fa-pencil"></i>
                          </a>
                          <form action="/quest_answer/{{ $item->id }}" method="post">
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
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
