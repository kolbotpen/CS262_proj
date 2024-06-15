<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <title>WORKSPACE</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nav-workspace.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/sidebar-workspace.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/workspace.css') }}" rel="stylesheet">
</head>
<body>
  @include('layouts.nav-workspace')
  @include('layouts.sidebar-workspace')

  <div class="container-fluid">
    <div class="row">
      <main>
        {{-- @include('layouts.sidebar-workspace') --}}
        @yield('content')
      </main>
    </div>
  </div>
  @include('layouts.footer')

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
