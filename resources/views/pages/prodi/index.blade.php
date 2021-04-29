@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Program Studi</h1>
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
                    <th>Jenjang</th>
                    <th>Program Studi</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($majors as $major)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $major->degree }}</td>
                      <td>{{ $major->name }}</td>
                      <td>
                        <button type="button" class="btn btn-icon btn-sm btn-warning btn-edit" data-id="{{ $major->id }}" data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fas fa-pencil-alt"></i></button>
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
          <h5 class="modal-title">Tambah Program Studi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('prodi.store') }}" method="post" id="form-tambah-prodi">
            @csrf
            <div class="form-group">
              <label for="">Jenjang</label>
              <select class="form-control selectric" name="degree" id="jenjang">
                <option selected value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="Profesi">Profesi</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Nama Program Studi</label>
              <input type="text" class="form-control prodi" name="name" id="nama">
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
          <h5 class="modal-title">Edit Program Studi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('prodi.update') }}" method="post" id="form-edit-prodi">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="">Jenjang</label>
              <select class="form-control selectric" name="degree" id="jenjang_edit">
                <option selected value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="Profesi">Profesi</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Nama Program Studi</label>
              <input type="text" class="form-control prodi" name="name" id="nama_edit">
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
@endsection

@push('page-js')
    <script src="{{ asset('assets/js/page/program-studi.js') }}"></script>
@endpush
