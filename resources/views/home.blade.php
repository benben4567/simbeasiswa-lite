@extends('layouts.app2')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Penerima Beasiswa</h4>
            </div>
            <div class="card-body">
              {{ $student }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jenis Beasiswa</h4>
            </div>
            <div class="card-body">
              {{ $type }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-flag"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Program Studi</h4>
            </div>
            <div class="card-body">
              {{ $major }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pengguna</h4>
            </div>
            <div class="card-body">
              {{ $user }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistics</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart" height="182"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistics</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart2" height="182"></canvas>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push('lib-js')
@endpush

@push('page-js')
    <script src="{{ asset('assets/js/page/home.js') }}"></script>
@endpush
