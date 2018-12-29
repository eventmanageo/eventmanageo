@extends('layouts.header_u')

@section('content')
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
        <div class="col-sm" id="grid1" onclick="location.href='{{ url('multi') }}'">
                    
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

@endsection
