<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top public-navbar">
      <div class="jumbotron jumbotron-home">
        <div class="bg"></div>
        <div class="container">
          <div class="navbar-header public-navbar-header">
            <img src="{{ asset('static/Kingdomhire_logo.svg') }}" class="logo" width="100%">

          <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="collapse navbar-collapse vehicle-dashboard-navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
              <a href="{{ route('public.home') }}"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li class="{{ Request::is('vehicles') ? ' active' : '' }}">
              <a href={{ route('public.vehicles') }}><span class="glyphicon glyphicon-wrench"></span> Vehicles</a>
            </li>
            <li class="{{ Request::is('contact') ? ' active' : '' }}">
              <a href="{{ route('public.contact') }}"><span class="glyphicon glyphicon-phone-alt"></span> Contact</a>
            </li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
              <li class="{{ Request::is('login') ? ' active' : '' }}">
                <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
              </li>
            @else
              <li>
                <a href="{{ route('admin.dashboard') }}"><span class="glyphicon glyphicon-stats"></span> Admin Dashboard</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
