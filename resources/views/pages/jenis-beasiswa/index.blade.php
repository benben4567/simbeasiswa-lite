@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Jenis Beasiswa</h1>
    </div>
  </section>

  <div class="section-body">
    {{-- Alert --}}
    @include('layouts.alert')

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="example" style="width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>
                      #
                    </th>
                    <th>Beasiswa</th>
                    <th>Sponsor</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($types as $type)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $type->name }}</td>
                      <td>{{ $type->sponsor }}</td>
                      <td>
                        <button type="button" class="btn btn-icon btn-warning btn-edit" data-id="{{ $type->id }}"><i class="fas fa-pencil-alt"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Jenis Beasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('jenis-beasiswa.store') }}" method="post" id="form-tambah-jenis" autocomplete="off">
            @csrf
            <div class="form-group">
              <label for="">Beasiswa</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nama Beasiswa">
            </div>
            <div class="form-group">
              <label for="">Sponsor / Penyelenggara</label>
              <input type="text" class="form-control" name="sponsor" id="sponsor" placeholder="Nama Sponsor">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Jenis Beasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('jenis-beasiswa.update') }}" method="post" id="form-edit-jenis" autocomplete="off">
            @csrf
            @method('put')
            <input type="hidden" name="id">
            <div class="form-group">
              <label for="">Beasiswa</label>
              <input type="text" class="form-control" name="name" id="name-edit" >
            </div>
            <div class="form-group">
              <label for="">Sponsor / Penyelenggara</label>
              <input type="text" class="form-control" name="sponsor" id="sponsor-edit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-simpan-edit">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Import -->
  <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Import Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="mb-2">
                Contoh format : <a href="{{ asset('storage/files/format_upload_beasiswa.xlsx') }}">format_upload_beasiswa.xlsx</a>
              </div>
              <form action="{{ route('jenis-beasiswa.import') }}" method="post" id="form-import-jenis" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file" accept=".xls, .xlsx" required>
                    <label class="custom-file-label" for="customFile">Pilih berkas</label>
                  </div>
                  <small id="fileHelpId" class="form-text text-muted">Format: .xls | .xlsx</small>
                </div>
              </form>
              <blockquote>Upload file excel menggunakan contoh format diatas agar tidak terjadi error ketika proses import.</blockquote>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" id="btn-import">Import</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/jenis-beasiswa.js') }}"></script>
@endpush
