@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Mahasiswa</h1>
    </div>
  </section>

  <div class="section-body">

    @include('layouts.alert')

    <div class="row justify-content-md-center">
      <div class="col-6 ">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Detail Mahasiswa</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('mahasiswa.update') }}" method="post" id="form-detail-mahasiswa">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{ $student->id }}">
              <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select class="form-control selectric" name="prodi" id="prodi">
                  @foreach ($majors as $major)
                    <option value="{{ $major->id }}" {{ $student->major_id == $major->id ? 'selected' : '' }}>{{ $major->full_name }}</option>
                  @endforeach
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $student->nama) }}">
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">NIM</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim', $student->nim) }}">
                @error('nim')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="nohp" id="nohp" value="{{ old('no_hp', $student->no_hp) }}" placeholder="08xxxxxxxxxx">
                <input type="hidden" name="no_hp" value="{{ old('no_hp', $student->no_hp) }}">
                @error('no_hp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/mahasiswa-detail.js') }}"></script>
@endpush
