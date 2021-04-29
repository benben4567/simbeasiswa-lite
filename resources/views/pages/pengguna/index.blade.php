@extends('layouts.app2')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Pengguna</h1>
    </div>
  </section>

  <div class="section-body">
    @if(session('success'))
      <div class="alert alert-success alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="fas fa-check "></i></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Sukses</div>
          {{ session('success') }}
        </div>
      </div>
    @endif

    @if(session('failed'))
      <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="fas fa-times "></i></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Gagal</div>
          {{ session('failed') }}
        </div>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="fas fa-times "></i></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Oops! Terjadi kesalahan.</div>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif

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
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td><a href="#" role="button" class="btn-edit" data-id="{{ $user->id }}">{{ $user->name }}</a></td>
                      <td>{{ $user->role }}</td>
                      <td><div class="badge {{ $user->status == 'aktif' ? 'badge-success' : 'badge-danger'}}">{{ $user->status }}</div></td>
                      <td>
                        <div class="form-group">
                          <label class="custom-switch mt-2 pl-0">
                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $user->id }}" class="custom-switch-input toggle" {{ $user->status == 'aktif' ? 'checked' : '' }}>
                            <span class="custom-switch-indicator"></span>
                          </label>
                        </div>
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
          <h5 class="modal-title">Tambah Pengguna Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('pengguna.store') }}" method="post" id="form-tambah-pengguna">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password">
              <small class="form-text text-muted">Min. 8 Karakter</small>
            </div>
            <div class="form-group">
              <label for="password_confirmation">Ulangi Password</label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"`>
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control selectric" name="role" id="role">
                <option value="admin" selected>Admin</option>
                <option value="super-admin">Super Admin</option>
              </select>
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
          <h5 class="modal-title">Edit Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('pengguna.update') }}" method="post" id="form-edit-pengguna">
            @csrf
            @method('put')
            <input type="hidden" name="id">
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" name="name" id="name_edit" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email_edit" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password">
              <small class="form-text text-muted">Min. 8 Karakter</small>
            </div>
            <div class="form-group">
              <label for="password_confirmation">Ulangi Password</label>
              <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control selectric" name="role" id="role_edit" required>
                <option value="admin">Admin</option>
                <option value="super-admin">Super Admin</option>
              </select>
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
  <script src="{{ asset('assets/js/page/pengguna.js') }}"></script>
@endpush
