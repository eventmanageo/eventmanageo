@extends('layouts.app')

@section('content')
        

  <!--gellary heading -->
  <div>
    <div class="container">
        <div class="container" style="margin-top:5%">
          <h2 style="text-align:center;color: crimson">Gellary</h2>
        </div>
        <div style="text-align:center">
          <p style="margin-top:2%" class="Events">Events Is A Professionally Managed By Eventmanager</p>
        </div>
        
        <hr style="text-align:center;width:10%;background-color:black;height:2px">
    </div>
  </div>

  <!--gellary photos-->

  <div>
    <div class="container">
        <div class="row">
          <div class="col-sm">
            <img src="images/39.jpg" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-sm">
            <img src="images/27.jpg" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-sm">
            <img src="images/29.jpg" class="img-fluid" alt="Responsive image">
          </div>
        </div>

        <div class="row">
            <div class="col-sm">
              <img src="images/37.jpeg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-sm">
              <img src="images/5.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-sm">
              <img src="images/g1.jpg" class="img-fluid" alt="Responsive image">
            </div>
          </div>

          <div class="row">
            <div class="col-sm">
              <img src="images/g9.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-sm">
              <img src="images/g2.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-sm">
              <img src="images/27.jpg" class="img-fluid" alt="Responsive image">
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
                    <img src="images/b4.jpg" alt="">
              </div>
              <div class="col" id="footer_gallery">
                  <img src="images/b1.jpg" alt="">
              </div>
            </div>
            <div class="row" id="footer_des2">
                <div class="col" id="footer_gallery">
                    <img src="images/b2.jpg" alt="">
                </div>
                <div class="col" id="footer_gallery">
                      <img src="images/b3.jpg" alt="">
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
@endsection