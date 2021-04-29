<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ set_active('home') }}"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Beasiswa</li>
    <li class="{{set_active('jenis-beasiswa.index')}}"><a class="nav-link" href="{{ route('jenis-beasiswa.index') }}"><i class="far fa-file-alt"></i> <span>Jenis</span></a></li>
    <li class="{{set_active(['beasiswa.index','beasiswa.show'])}}"><a class="nav-link" href="{{ route('beasiswa.index') }}"><i class="fas fa-clipboard-check"></i> <span>Pembukaan</span></a></li>
    <li class="menu-header">Mahasiswa</li>
    <li class="{{set_active('prodi.index')}}"><a class="nav-link" href="{{ route('prodi.index') }}"><i class="fas fa-university"></i> <span>Program Studi</span></a></li>
    <li class="{{set_active(['mahasiswa.index','mahasiswa.show'])}}"><a class="nav-link" href="{{ route('mahasiswa.index') }}"><i class="fas fa-users"></i> <span>Mahasiswa</span></a></li>
    <li class="menu-header">Pelaporan</li>
    <li class="{{set_active('rekapitulasi.index')}}"><a class="nav-link" href="{{ route('rekapitulasi.index') }}"><i class="far fa-file-excel"></i> <span>Rekapitulasi</span></a></li>
    @if(Auth::user()->role == 'super-admin')
      <li class="menu-header">Pengelolaan</li>
      <li class="{{set_active('pengguna.index')}}"><a class="nav-link" href="{{ route('pengguna.index') }}"><i class="fas fa-user-tie"></i> <span>Pengguna</span></a></li>
    @endif
</ul>
