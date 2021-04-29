@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Pembukaan Beasiswa</h1>
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
                    <th>Jumlah Penerima</th>
                    <th>Berkas SK</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($scholarships as $sch)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><a href="{{ route('beasiswa.show',['id' => $sch->id]) }}">{{ $sch->scholarshipType->name }}</a></br><div class="text-muted">{{ $sch->period }}</div> </td>
                      <td>{{ $sch->students_count }}</td>
                      <td>
                        <a href="{{ $sch->document ? asset('storage/files/'.$sch->document) : '#'}}" target="_blank" class="btn btn-icon btn-sm {{ $sch->document ? 'btn-danger' : 'btn-secondary'}}" role="button" data-toggle="tooltip" data-placement="top" title="{{ $sch->document ? 'Download' : 'Belum tersedia'}}" {{ $sch->document ? '' : 'disabled'}}><i class="fas fa-file-pdf"></i></a>
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

  <!-- Modal Pembukaan Baru-->
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pembukaan Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('beasiswa.store') }}" method="post" id="form-pembukaan">
            @csrf
            <div class="form-group">
              <label for="">Pilih Beasiswa</label>
              <select class="form-control selectric" name="beasiswa" id="beasiswa">
                <option selected disabled>- pilih -</option>
                @foreach ($types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Periode</label>
              <select class="form-control selectric" name="period" id="period">
                <option value="" selected disabled>- pilih -</option>
                @for($i = 2015; $i <= (int)date('Y') ; $i++)
                  <option class="text-dark">{{ 'Ganjil '.(string)$i.'/'.(string)($i+1) }}</option>
                  <option>{{ 'Genap '.(string)$i.'/'.(string)($i+1) }}</option>
                @endfor
              </select>
            </div>
            <div class="form-group">
              <label for="">Nominal Beasiswa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    Rp
                  </div>
                </div>
                <input type="text" class="form-control currency">
                <input type="hidden" class="form-control" name="nominal">
              </div>
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
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/pembukaan-beasiswa.js') }}"></script>
@endpush
