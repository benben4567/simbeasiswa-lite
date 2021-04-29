<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('code') &mdash; @yield('title')</title>

  <!-- General CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Template CSS -->
  <link href="{{ asset('css/template.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>@yield('code')</h1>
            <div class="page-description">
              @yield('message')
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="{{ route('home') }}">Kembali</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> ITSK RS dr. Soeproaoen - Bidang Kemahasiswaan
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('js/template.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
