@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Rekapitulasi</h1>
    </div>
  </section>

  <div class="section-body">
    <div class="row">
      <div class="col-6">
        <div class="card card-primary">
          <div class="card-header">
            <strong>Ekspor berdasarkan Program Studi</strong>
          </div>
          <div class="card-body">
            <p>Download file rekapitulasi beasiswa sesuai <strong>Program Studi</strong> yang dipilih.</p>
            <div class="form-group">
              <label for="prodi">Program Studi</label>
              <select class="form-control selectric" name="prodi" id="prodi" required>
                <option value="" selected>- pilih -</option>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}">{{ $major->full_name }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <button type="button" class="btn btn-light float-left"><i class="fas fa-print"></i> Cetak</button>
              <button type="button" class="btn btn-success float-right"><i class="fas fa-file-excel"></i> Excel</button>
              <button type="button" class="btn btn-danger float-right mx-2"><i class="fas fa-file-pdf"></i> PDF</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card card-primary">
          <div class="card-header">
            <strong>Ekspor berdasarkan Jenis Beasiswa</strong>
          </div>
          <div class="card-body">
            <p>Download file rekapitulasi beasiswa sesuai <b>Jenis Beasiswa</b> yang dipilih.</p>
            <div class="form-group">
              <label for="jenis">Jenis Beasiswa</label>
              <select class="form-control selectric" name="jenis" id="jenis" required>
                <option value="" selected>- pilih -</option>
                @foreach ($types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <button type="button" class="btn btn-light float-left"><i class="fas fa-print"></i> Cetak</button>
              <button type="button" class="btn btn-success float-right"><i class="fas fa-file-excel"></i> Excel</button>
              <button type="button" class="btn btn-danger float-right mx-2"><i class="fas fa-file-pdf"></i> PDF</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <strong>Ekspor Semua</strong>
          </div>
          <div class="card-body">
            <p>Download file rekapitulasi beasiswa secara keseluruhan.</p>
            <div>
              <button type="button" class="btn btn-light float-left"><i class="fas fa-print"></i> Cetak</button>
              <button type="button" class="btn btn-success float-right"><i class="fas fa-file-excel"></i> Excel</button>
              <button type="button" class="btn btn-danger float-right mx-2"><i class="fas fa-file-pdf"></i> PDF</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/rekapitulasi.js') }}"></script>
@endpush
