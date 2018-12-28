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

        <link href="{{ asset('css/style_a.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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
          <a href="#">24*2 Help</a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
          </div>
          
        </div>


    </div>
    </nav>


<div class="container">
      <div class="container" style="margin-top:5%">
        <h2 style="text-align:center;color: crimson">welcome</h2>
      </div>
      <div style="text-align:center">
        <p style="margin-top:2%" class="Events">Events Is A Professionally Managed By Eventmanager</p>
      </div>
      <div style="margin-top:5%">
        <p class="text">We as a eventOmanage provide you all possible solution for organizing and managing their event at single click at single place without any kind of burden at all.</p>
      </div>
      <hr style="text-align:center;width:10%;background-color:black;height:2px">
  </div>


  <!--Grid layout start and first grid-->

  <div class="container" style="margin-top:10%">
      <div class="row" id="row1">
        <div class="col-sm" id="grid1" onclick="location.href='{{ url('service') }}'">
                    
            <div class="media">
              <i class="fa fa-suitcase" id="font_awesome" aria-hidden="true"></i>
                <div class="media-body">
                  <h5 class="mt-0">Wedding</h5>
                  <p>Wedding Event is a managed by EventOmanage and provide all kind of services by Event manager and Vendpors.</p>
                </div>
              </div>
        </div>
      

        <div class="col-sm" id="grid2" onclick="location.href='{{ url('login') }}'">
            <div class="media">
                <i class="fa fa-birthday-cake mr-3 display-5" style="font-size:48px;margin-top: 10%"></i>
                <div class="media-body">
                  <h5 class="mt-0">Birthday</h5>
                  <p>Birthday party professionally and provide whole Services by EventOmanage.</p>
                </div>
              </div>
        </div>
      
        <div class="col-sm" id="grid3" onclick="location.href='{{ url('login') }}'"> 
            <div class="media">
              <i class="fa fa-calendar" id="font_awesome" aria-hidden="true"></i>
                <div class="media-body">
                  <h5 class="mt-0">Anniversary</h5>
                  <p>Event Management of Wedding Anniversaries in provide whole services.</p>
                </div>
              </div> 
        </div>
          
      </div>
    </div>

    <!--Grid layout start second grid-->

    <div class="container">
        <div class="row" id="row1">
          <div class="col-sm" id="grid1" onclick="location.href='{{ url('login') }}'">
              <div class="media">
                <i class="fa fa-handshake" id="font_awesome" aria-hidden="true"></i>
                  
                  <div class="media-body">
                    <h5 class="mt-0">Engagement ceremony</h5>
                    <p>The engagement ceremony is an important pre-wedding ritual in Indian cultures.</p>
                  </div>
                  
                  
                </div>
          </div>
          
          <div class="col-sm" id="grid2" onclick="location.href='{{ url('login') }}'">
              <div class="media">
                <i class="fa fa-users" id="font_awesome" aria-hidden="true"></i>
                  <div class="media-body">
                    <h5 class="mt-0">Fresher’s party</h5>
                    <p>Fresher’s party management was organized by EventOmanage.</p>
                  </div>
                </div>
          </div>
          
          <div class="col-sm" id="grid3" onclick="location.href='{{ url('login') }}'">
              <div class="media">
                <i class="fa fa-beer" id="font_awesome" aria-hidden="true"></i>
                  <div class="media-body">
                    <h5 class="mt-0">Promotions</h5>
                    <p>Promotion Party Management Service, Catering, photography,video shooting and provide others services manage by EventOmanage.</p>
                  </div>
                </div>
          </div>
          
          
        </div>
      </div>




 
    <!--Footer part created-->
    <div style="padding:0%;background-color:rgb(51, 51, 51);margin-top: 5%">
    <div class="container">
      <div class="row">
        <div class="col">
          
          <div class="container">
            <p class="footer_des">ABOUT US</p>
            <p class="footer_des1">“eventOmanage” strongly focused towards providing its best services to user for managing every event of their own choice. </p>
          </div>
        </div>
        <div class="col">
          <div class="container">
              <p class="footer_des">CONTACT US</p>
              <p class="footer_des1">ssec bhavnagar-364060</p>
              <p class="footer_des1">jagdishparmarjd34@gmail.com</p>
              <p class="footer_des1">+91 8866825150</p> 
              <p class="footer_des1">+91 9265712100</p>

            </div>
          </div>
        
          <div class="col">
              <div class="container">
                  <p class="footer_des">GELLARY</p>
                  <div class="row" id="footer_des2">
              <div class="col" id="footer_gallery">
                    <img id="foot_img" src="images/b4.jpg" alt="">
              </div>
              <div class="col" id="footer_gallery">
                  <img  id="foot_img" src="images/b1.jpg" alt="">
              </div>
            </div>
            <div class="row" id="footer_des2">
                <div class="col" id="footer_gallery">
                    <img id="foot_img" src="images/b2.jpg" alt="">
                </div>
                <div class="col" id="footer_gallery">
                      <img id="foot_img" src="images/b3.jpg" alt="">
                </div>
              </div>

              </div>

          </div>
          <div class="col">
            <div class="container">
            <p class="footer_des">SUBSCRIBE</p>
            <p class="footer_des1">please Subscribe our site</p>
            <form action="#">
                <input type="text" placeholder="Email address" id="input"><br>
                <input type="submit" value="subscribe" >
                
            </form>
            </div>
            </div>
          
      
      </div>
    </div>

  </div>
  <!--close footer-->
  <div id="End">
    <div class="container">
      <p class="End_footer">© 2018 EventOmanage | created-by SSEC Students</p>
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