@extends('layouts.app')

@section('content')
<div class="container>.row">
  <!--Image Slider creates-->    
  <div id="demo" class="carousel slide" data-ride="carousel" style="">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/2.jpg" alt="Los Angeles" width="100%" height="500">
          <div class="carousel-caption">
            <h3>Entertaintment</h3>
            <p>Thank you!</p>
          </div>   
        </div>
        <div class="carousel-item">
          <img src="images/3.jpg" alt="Chicago" width="100%" height="500">
          <div class="carousel-caption">
            <h3>Wedding caremony</h3>
            <p>Thank you!</p>
          </div>   
        </div>
        <div class="carousel-item">
          <img src="images/1.jpg" alt="New York" width="100%" height="500">
          <div class="carousel-caption">
            <h3>Wedding Services</h3>
            <p>Thank you!</p>
          </div>   
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    <!--//close Image slider-->
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
        <div class="col-sm" id="grid1" onclick="location.href='{{ url('login') }}'">
                    
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
              <i class="fa fa-calendar-o" id="font_awesome" aria-hidden="true"></i>
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
                <i class="fa fa-handshake-o" id="font_awesome" aria-hidden="true"></i>
                  
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



  <!--services-->
  <div class="container">
      <div class="container" style="margin-top:5%">
        <h2 style="text-align:center;color: crimson">Services</h2>
      </div>
      <div style="text-align:center">
        <p style="margin-top:2%" class="Events">Events Is A Professionally Managed By Eventmanager</p>
      </div>
      <div style="margin-top:5%">
        <p class="text">we us eventOmanage providing whole type of services related to any functions and caremony.</p>
      </div>
      <hr style="text-align:center;width:10%;background-color:black;height:2px">
  </div>
  <!--End-->

  <!--services photos and description-->

  <div class="container" style="margin-top:10%">
      <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="images/12.jpg" alt="Card image cap">
                <div class="card-body">
                  <p id="services_type">Wedding invites</p>
                  <p class="card-text">Assisting in the design and coordination of every aspect of wedding-related print material in keeping with the event theme</p>
                </div>
              </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="images/23.jpg" alt="Card image cap">
                <div class="card-body">
                  <p id="services_type">Catering</p>
                  <p class="card-text">Catering service for providing many types of foods and provide pakages.</p>
                </div>
              </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="images/24.jpg" alt="Card image cap">
                <div class="card-body">
                  <p id="services_type">Choreography</p>
                  <p class="card-text">Suggesting and booking choreograph..hers for dance performances including your music, special first dance, and planning locations for rehearsals</p>
                </div>
              </div>
        </div>
      </div>
    </div>

    

    <!-- services first row completed-->
    <div class="container" style="margin-top:3%">
        <div class="row">
          <div class="col-sm">
              <div class="card" style="width: 100%;">
                  <img class="card-img-top" src="images/b1.jpg" alt="Card image cap">
                  <div class="card-body">
                      <p id="services_type">Wedding invites</p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
          </div>
          <div class="col-sm">
              <div class="card" style="width: 100%;">
                  <img class="card-img-top" src="images/25.jpg" alt="Card image cap">
                  <div class="card-body">
                      <p id="services_type">Wedding Venues & Locations</p>
                    <p class="card-text">Suggesting wedding and event venues, and location visits based on the client’s theme, budget and requirement</p>
                  </div>
                </div>
          </div>
          <div class="col-sm">
              <div class="card" style="width: 100%;">
                  <img class="card-img-top" src="images/26.jpg" alt="Card image cap">
                  <div class="card-body">
                      <p id="services_type">Wedding - Transportation</p>
                    <p class="card-text">Conceptualizing, designing and coordinating all aspects of wedding design and décor, including lighting, floral set-ups and execution of themes, after understanding your vision</p>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <!-- services first row completed-->
      <div class="container" style="margin-top:3%">
          <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="images/27.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p id="services_type">Photography</p>
                      <p class="card-text">Arranging wedding photography specialists for every wedding-related event, pre-wedding shoot, engagement shoot and bridal photo shoot, in keeping with your vision and budget</p>
                    </div>
                  </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="images/28.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p id="services_type">Videography / Cinematography</p>
                      <p class="card-text">Arranging wedding videography specialists across a diverse set of styles including traditional, documentary, quirky and Bollywood, in keeping with your vision and budget</p>
                    </div>
                  </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="images/29.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p id="services_type">Makeup & Hair</p>
                      <p class="card-text">Consulting and coordinating with designers and professional stylists for hair, makeup, mehendi, accessories, wardrobe and sari draping as per your vision and budget, and in keeping with the latest trends and your body type</p>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <!-- services first row completed-->

      <!--card slider using boostrap-->
      <!--services-->
  
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
                  <p class="footer_des">GALLARY</p>
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

