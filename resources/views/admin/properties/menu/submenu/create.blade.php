@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Sub Menu</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="/menu/submenu" method="post">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h4>Sub Menu</h4>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <input type="hidden" name="menu_id" value="{{ $menuId }}">
                  <label for="ringkasan_informasi">
                    <h5 class="mb-0">Nama</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ old('nama') }}" id="nama"
                    name="nama">
                  @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="ringkasan_informasi">
                    <h5 class="mb-0">URL</h5>
                  </label>
                  <input class="w-100 form-control" type="text" value="{{ old('url') }}" id="url"
                    name="url">
                  @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <a href="/menu/submenu/{{ $menuId }}" class="btn btn-secondary">kembali</a>
                <button type="submit" class="btn btn-primary">Buat</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
