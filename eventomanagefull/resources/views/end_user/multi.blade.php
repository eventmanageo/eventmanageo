<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <!-- Scrollbar Custom CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

            <!-- Font Awesome JS -->
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
            <script defer src="{{ asset('js/multi.js') }}"></script>

        <link href="{{ asset('css/style_a.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/multi.css') }}" rel="stylesheet">


        <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    </head>
    <body>
<div>
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
          <a href="#">Profile</a>
        </li>

        <li>
          <a href="#">My orders</a>
        </li>
        <li>
          <a href="#">add services</a>
        </li>
        <li>
          <a href="#">Help</a>
        </li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
        </form>
        

      </ul>



    </nav>

    <!-- Page Content  -->
    <div id="">

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>eventOmanage</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" style="margin-right:3%">
            <li class="nav-item dropdown">
                                <label id="navbarDropdown" class="nav-link" href="#" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                  </label>
                            </li>
            </ul>
          </div>
          
        </div>


    </div>
    </nav>

<!-- page description-->
<div class="container" style="margin-top:7%;width:70%">
  <div class="row">
    <div class="col-4" id="multi-col1"> 
    <img src="images/m-11.jpg" alt="New York" width="100%" height="500">
    
    </div>
    <div class="col border">
    <div class="container-fluid">
          
    
          <form id="regForm" action="">

          <h1 id="multi_name">eventOmanage</h1>
          <p>service make easy life...</p>

          <!-- One "tab" for each step in the form: -->
          <div class="tab">
            <label for="txt" id="multi-txt">Who is getting married?</label>
          <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="optradio">Groom
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="optradio">Bride
              </label>
            </div>
            
          </div>

          <div class="tab">
                  <div class="form-group row">
                      <label for="example-date-input" class="col-2 col-form-label">Choose A location</label>
                      <div class="col-10">
                      <select class="form-control" id="exampleSelect1">
                        <option>Ahmedabad</option>
                        <option>Bhavnagar</option>
                        <option>Surat</option>
                        <option>Baroda</option>
                        <option>Rajkot</option>
                      </select>
                      </div>
                  </div>
                      <div class="form-group row">
                      <label for="example-date-input" class="col-2 col-form-label">Date</label>
                      <div class="col-10">
                      <input class="form-control" type="date" value="2018-12-29" id="example-date-input">
                    </div>
              </div>
              </div>

          <div class="tab">
            <label for="txt">Number of guest</label>
            <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio">less than 100
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio">100-300
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio">300-600
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optradio">600-900
                    </label>
                  </div>
            </div>

          

          <div style="overflow:auto;">
            <div style="float:right;">
              <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button"  class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>

          </form>
</div>

    </div>
  </div>

</div>


    </div>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

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
</div>
</body>
</html>