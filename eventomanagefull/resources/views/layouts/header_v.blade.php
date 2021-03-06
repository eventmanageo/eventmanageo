<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  {{-- <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}

  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <!-- Font Awesome JS -->
  <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/style_a.css') }}" rel="stylesheet">

  <script type="text/javascript">
    $(document).ready(function() {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#dismiss, .overlay').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
      });

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
</head>
<body>
  <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
        <div id="dismiss">
          <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
          <h3>eOm</h3>
        </div>

        <ul class="list-unstyled components">
          <li>
            <a href="/vendor/profile">Profile</a>
          </li>
          <li>
            <a href="/vendororder/{{Session::get('vendor_category')}}">Events</a>
          </li>
          <li>
              <a href="/company/details/{{Session::get('vendor_category')}}">Add Company Details</a>
          </li>
          <li>
            <a href="#showmeSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Show me</a>
            <ul class="collapse list-unstyled" id="showmeSubMenu">
              <li>
                <a href="/list/service/{{Session::get('vendor_category')}}">My services</a>
              </li>
              @if(Session::get('vendor_category')==="caterer" || Session::get('vendor_category')==="makeup" || Session::get('vendor_category')==="photographer")
                <li>
                  <a href="/list/package/{{Session::get('vendor_category')}}">My packages</a>
                </li>
              @endif
            </ul>
          </li>
          <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Service Management</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                  <a href="/{{Session::get('vendor_category')}}/add/service">Add services</a>
              </li>
              <li>
                  @if(Session::get('vendor_category')==="caterer")
                      <a href="/{{Session::get('vendor_category')}}/make/package/breakfast">Make package Breakfast</a>
                      <a href="/{{Session::get('vendor_category')}}/make/package/lunch">Make package Lunch</a>
                      <a href="/{{Session::get('vendor_category')}}/make/package/dinner">Make package Dinner</a>
                  @endif
                  @if(Session::get('vendor_category')==="makeup")
                      <a href="/{{Session::get('vendor_category')}}/make/package">Make Package Makeup</a>
                  @endif
                  @if(Session::get('vendor_category')==="photographer")
                      <a href="/{{Session::get('vendor_category')}}/make/package">Make Package Photographer</a>
                  @endif
              </li>
            </ul>
          </li>
          <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          </li>
        </ul>
      </nav>
      <!-- Page Content  -->
      <div id="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
              <i class="fas fa-align-left"></i>
              <span>eventOmanage</span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto" style="margin-right:3%">
                <li class="nav-item">
                  <a id="navbarDropdown" class="nav-link" href="#" role="button">
                      {{ Auth::user()->name }}
                  </a>
                </li>
              </ul>
            </div> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </nav>
      </div>

    <!-- Write description -->
    <main class="py-2">
      @yield('content')
    </main>
  </div>
</body>
</html>