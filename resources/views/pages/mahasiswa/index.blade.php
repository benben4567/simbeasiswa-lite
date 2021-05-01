@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Mahasiswa</h1>
    </div>
  </section>

  <div class="section-body">

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
                    <th>Nama</th>
                    <th>Program Studi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <a href="{{ route('mahasiswa.show', ['id' => $student->id ]) }}"><strong>{{ $student->nama }}</strong></a><br>
                        <small>NIM. {{ $student->nim }}</small>
                      </td>
                      <td>{{ $student->major->full_name }}</td>
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
          <h5 class="modal-title">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" id="form-tambah-mahasiswa">
            @csrf
            <div class="form-group">
              <label for="">Nama Mahasiswa</label>
              <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" name="nim" id="nim">
            </div>
            <div class="form-group">
              <label for="">Program Studi</label>
              <select class="form-control selectric" name="prodi" id="prodi">
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}">{{ $major->full_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="no_hp">No. HP</label>
              <input type="text" class="form-control" name="nohp" id="nohp" placeholder="08xxxxxxxxxx">
              <input type="hidden" name="no_hp">
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

  <!-- Modal Import -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2" aria-hidden="true">
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
                Contoh format : <a href="{{ asset('storage/files/format_upload.xlsx') }}">format_upload.xlsx</a>
              </div>
              <form action="{{ route('mahasiswa.import') }}" method="post" id="form-import-mahasiswa" enctype="multipart/form-data">
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
    <script src="{{ asset('assets/js/page/mahasiswa.js') }}"></script>
@endpush
