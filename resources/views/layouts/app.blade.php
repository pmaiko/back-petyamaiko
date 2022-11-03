<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  {{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>CMS PETYA</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light min-vh-100">
<div class="d-flex w-100">
  <div class="row w-100 min-vh-100">
    <div class="col-2">
      <div class="d-flex flex-column bg-secondary h-100">
        <a
          href="{{ route('home') }}"
          class="font h4 text-white text-center mt-2 bg-secondary"
        >
          <span class="text-warning">CMS</span> PETYA
        </a>
        <div class="btn-group-vertical w-100" role="group" aria-label="Vertical button group">
          <a
            href="{{ route('pages.index') }}"
            type="button"
            class="{{ request()->is('pages') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              PAGES
          </a>
          <a
            type="button"
            class="{{ request()->is('services') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              SERVICES
          </a>
          <a
            href="{{ route('projects') }}"
            type="button"
            class="{{ request()->is('projects') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              PROJECTS
          </a>
          <a
            href="{{ route('info') }}"
            type="button"
            class="{{ request()->is('info') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              INFO
          </a>
          <a
            type="button"
            class="{{ request()->is('about') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              ABOUT
          </a>
          <a
            type="button"
            class="{{ request()->is('contacts') ? 'btn-primary' : 'btn-dark'}} btn text-lg-start rounded-0 mb-1"
          >
              CONTACT
          </a>
        </div>
      </div>
    </div>
    <div class="col-10">
      <div class="mt-2">
        @yield('content')
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>
