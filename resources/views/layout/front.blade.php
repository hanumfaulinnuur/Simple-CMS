<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <title>Portal | @yield('title')</title>
        <link href="{{ asset('assets/img/kabar.png') }}" rel="icon">

@if (Auth::check())
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow p-2 px-5 mb-5 bg-body-tertiary rounded">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/img/kabar.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        <b class="text-primary-emphasis" style="font-size: 21px">Kabar News</b>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: 18px">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
        </li>
      </ul>
      <ul class="nav-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi, {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <form action="{{ url('user/logout') }}" method="POST">
                @csrf
                <button type="submit"><span>Log Out</span></button></button>
                
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif
    </head>
    <body>
        @yield('content')
    </body>
</html>