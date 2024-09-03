@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengajuan Keberatan</h1>
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
              <h3 class="card-title">Data Pengajuan Keberatan</h3>

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
                    <th>no</th>
                    <th>Nama</th>
                    <th>Tujuan Penggunaan Informasi</th>
                    <th>Alasan penggunaan informasi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="contentArea">
                  @foreach ($submission as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        <div class="text-truncate" style="max-width: 500px;">
                          {{ $item->tujuan_penggunaan_informasi }}
                        </div>
                      </td>
                      <td>
                        <div class="text-truncate" style="max-width: 500px;">
                          {{ $item->alasan->alasan_pengajuan }}
                        </div>
                      </td>
                      <td>{{ $item->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}</td>
                      <td>
                        @if ($item->id_status == 1)
                          <span class="badge bg-warning">belum dibuka</span>
                        @elseif ($item->id_status == 2)
                          <span class="badge bg-info">{{ $item->status->status }}</span>
                        @elseif ($item->id_status == 3)
                          <span class="badge bg-danger">{{ $item->status->status }}</span>
                        @elseif ($item->id_status == 4)
                          <span class="badge bg-success">{{ $item->status->status }}</span>
                        @endif
                      </td>
                      <td>
                        <div class="d-flex flex-row">
                          <a href="/admin/pengajuan_keberatan/{{ $item->id }}" class="btn btn-primary">
                            @if ($item->id_status == 1)
                              Process
                            @else
                              View
                            @endif
                          </a>
                          <a href="/admin/pengajuan_keberatan/{{ $item->id }}/edit" class="btn btn-warning mx-2">
                            edit
                          </a>
                          <form action="/admin/pengajuan_keberatan/{{ $item->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                              onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <script>
                $(document).ready(function() {
                  console.log("jQuery siap");
              
                  function searchTable() {
                    console.log("Fungsi pencarian dipanggil");
                    var value = $("#searchInput").val().toLowerCase();
                    $("#contentArea tr").each(function() {
                      var rowText = $(this).text().toLowerCase();
                      $(this).toggle(rowText.indexOf(value) > -1);
                    });
                  }
              
                  $("#searchInput").on("input", function() {
                    console.log("Input berubah");
                    searchTable();
                  });
              
                  $("#searchButton").on("click", function() {
                    console.log("Tombol diklik");
                    searchTable();
                  });
                });
                </script>
            </div>
            <!-- /.card-body -->
          </div>
          {{ $submission->links('pagination::bootstrap-5') }}
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
