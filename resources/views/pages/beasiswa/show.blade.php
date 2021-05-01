@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Detail Pembukaan Beasiswa</h1>
      <!-- <h1>Nama Beasiswa - Periode</h1> -->
    </div>
  </section>

  <div class="section-body">

    @include('layouts.alert')

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <dl class="row mb-0">

              <input type="hidden" id="id" value="{{ $scholarship->id }}">
              <dt class="col-sm-2"><h6>Beasiswa</h6></dt>
              <dd class="col-sm-10"><h6>: <span class="nama">{{ $scholarship->scholarshipType->name }}</span></h6></dd>

              <dt class="col-sm-2"><h6>Periode</h6></dt>
              <dd class="col-sm-10"><h6>: <span class="periode">{{ $scholarship->period }}</span></h6></dd>

              <input type="hidden" class="currency" id="nominal" value="{{ $scholarship->nominal }}">
              <dt class="col-sm-2"><h6>Nominal</h6></dt>
              <dd class="col-sm-10"><h6>: Rp. <span class="nominal">{{ $scholarship->nominal }}</span></h6></dd>

              <dt class="col-sm-2"><h6>Surat Keputusan</h6></dt>
              <dd class="col-sm-10"><h6>:
                @if($scholarship->document)
                  <a href="{{ asset('storage/files/'.$scholarship->document)}}" target="_blank">{{ $scholarship->document }}</a>
                @else
                  -
                @endif
              </h6></dd>
            </dl>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2"><i class="fas fa-upload"></i> {{ $scholarship->document ? 'Perbarui SK' : 'Upload SK'}}</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="example" style="width: 100%;">
                <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($scholarship->students as $std)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      <a href="#"><strong>{{ $std->nama }}</strong></a></br>
                      <div>NIM. {{ $std->nim }}</div>
                    </td>
                    <td>{{ $std->major->full_name }}</td>
                    <td><button type="button" class="btn btn-icon btn-danger btn-sm btn-hapus" data-id="{{ $std->id }}" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash"></i></button></td>
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

  <!-- Modal Mahasiswa-->
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalMahasiswa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pilih Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <table class="table table-striped" id="example2" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Prodi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                    <tr>
                      <td>{{ $student->id }}</td>
                      <td>{{ $student->nim }}</td>
                      <td>{{ $student->nama }}</td>
                      <td>{{ $student->major->full_name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary btn-tambahkan">Tambahkan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Upload SK-->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalUploadSK" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload Surat Keputusan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('beasiswa.upload') }}" class="dropzone" id="mydropzone" enctype="multipart/form-data">
            <div class="fallback">
              <input name="file" type="file" />
            </div>
          </form>
          <div class="text-muted mt-2">Filetype: .pdf | Max size: 2MB</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Import Penerima-->
  <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalImport" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Import Mahasiswa Penerima</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              Contoh format : <a href="{{ asset('storage/files/format_upload.xlsx') }}">format_upload.xlsx</a>
              <form action="{{ route('beasiswa.import-student') }}" method="post" enctype="multipart/form-data" id="form-import-penerima">
                @csrf
                <input type="hidden" name="id" value={{ $scholarship->id }}>
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
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-import">Import</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/pembukaan-detail.js') }}"></script>
@endpush
