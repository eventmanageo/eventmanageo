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

<div>
  <div class="container">
        <div class="container" style="margin-top:5%">
          <h2 style="text-align:center;color: crimson">Contact us</h2>
        </div>
        <div style="text-align:center">
          <p style="margin-top:2%" class="Events">Events Is A Professionally Managed By Eventmanager</p>
        </div>
        <hr style="text-align:center;width:10%;background-color:black;height:2px">
    </div>
</div>
<!--close-->

<div style="margin-top:10%">
    <div class="container">
        <div class="row">
              <div class="col-sm border">
                  
                  <label id="contact_head" for="header">Contact us</label>
                  
              <form>
              <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Enter name">
            </div>
                
              <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject</label>
                    <input type="text" class="form-control" placeholder="Enter Subject">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> 
              </div>
              <div class="col-sm" style="padding-left:6%">
                <h2>Address</h2>
                
                    <i class="fa fa-map-marker" aria-hidden="true" id="contact_icon"></i>
                    <p id="contact_map">shantilal shah Engineering College</p>
                    <p id="contact_map">bhavnagar-364060</p>
                    <i class="fa fa-phone" aria-hidden="true" id="contact_icon"></i>
                    <p id="contact_map">+91 8866825150</p>
                    <p id="contact_map">+91 9265712100</p>
                    <i class="fa fa-envelope" aria-hidden="true" id="contact_icon"></i>
                    <p>jagdishparmarjd34@gmail.com</p>
                    <p>jagdishparmarjd22@gmail.com</p>
                            
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