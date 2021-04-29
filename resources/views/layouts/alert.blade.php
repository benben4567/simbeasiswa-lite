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
