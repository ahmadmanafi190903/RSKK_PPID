@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Berita</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="/news/{{ $item->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="row">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <h4>Berita</h4>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-3">
                <div class="mb-4">
                  <label for="image">
                    <h5 class="mb-0">Image</h5>
                  </label>
                  <div class="input-group mb-2">
                    <img src="/storage/{{ $item->image }}" class="w-100 mb-2" id="previewImage">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imageInput" name="image" onchange="showIframe()">
                        <label class="custom-file-label" for="image">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload image</span>
                      </div>
                    </div>
                    @error('image')
                      <div class="alert alert-danger w-100">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="mb-4">
                  <label for="judul">
                    <h5 class="mb-0">Judul</h5>
                  </label>
                  <input class="w-100 form-control" type="text" id="judul" name="judul" value="{{ old('judul') ?? $item->judul}} ">
                  @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="deskripsi">
                    <h5 class="mb-0">Deskripsi</h5>
                  </label>
                  <textarea class="w-100 form-control" name="deskripsi" cols="30" id="deskripsi">{{ old('deskripsi') ?? $item->deskripsi}}</textarea>
                  @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="url">
                    <h5 class="mb-0">Url</h5>
                  </label>
                  <input class="w-100 form-control" type="text" id="url" name="url" value="{{ old('url') ?? $item->url}}">
                  @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <a href="/news" class="btn btn-secondary">kembali</a>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
