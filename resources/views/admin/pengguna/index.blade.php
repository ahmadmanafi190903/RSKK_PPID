@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengguna <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addUser">+ pengguna</a></h1>
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
              <h3 class="card-title">Data Pengguna</h3>
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
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th class="align-middle" >no</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">NIP</th>
                    <th class="align-middle">Email</th>
                    <th class="align-middle">Role</th>
                    <th class="align-middle">Action</th>
                  </tr>
                </thead>
                <tbody id="contentArea">
                  @foreach ($users as $user)
                  <tr>
                    <td class="text-center align-middle text-wrap">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle text-wrap">{{ $user->name }}</td>
                    <td class="text-center align-middle text-wrap">{{ $user->nip }}</td>
                    <td class="text-center align-middle text-wrap">{{ $user->email }}</td>
                    <td class="text-center align-middle text-wrap">{{ $user->role }}</td>
                    @if ($user->role != 'super_admin')
                      <td>
                        <div class="d-flex flex-row">
                          <a href="#" class="btn btn-warning mx-2">edit</a>
                          <form action="#" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</button>
                          </form>
                        </div>
                      </td>
                    @else
                      <td></td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          {{-- {{ $information->links('pagination::bootstrap-5') }} --}}
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="addUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pengguna Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="post">
          <div class="modal-body">
            @csrf
            <textarea name="pesan_ditolak" id="pesan_ditolak" class="form-control mb-2" placeholder="Masukkan alasan pesan ditolak"></textarea>
            @error('pesan_ditolak')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection