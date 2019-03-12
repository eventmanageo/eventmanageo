@extends('layouts.header_m')

@section('content')

<!-- Custom CSS -->
<style type="text/css">

.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

#logo {
  background-color: #8bffff;
  position:relative;
  border-radius: 10px / 10px;
  float: left;
  padding: 10px;
    
}

#logo a span { 
position:absolute; 
  width:100%;
  height:100%;
  top:0;
  left: 0;
  z-index: 1;
  background-image: url('empty.gif');
}

#logo:hover {
	background-color: #8ed6ff;  
}

</style>
 


<div class="box box-solid container">
    <div class="container "><br>
    
        <h2 style="text-align: center;"><b>Allocated Events details</b></h2><br>
        <div class="row">
        <div id="logo" class="w-25 p-3">
                    <label for=""><b>Client Name :  </b>Parth Chudasama</label><br><br>
                    <label for=""><b>Event Name :  </b>Merrige </label><br><br>
                    <label for=""><b>Date :  </b>15/03/2019</label>
                    
                    <a href="event_details"><span></span></a>
        </div>
        <div id="logo" class="w-25 p-3" style="margin-left:20px;">
                    <label for=""><b>Client Name :  </b>Himanshu    </label><br><br>
                    <label for=""><b>Event Name :  </b>Reception</label><br><br>
                    <label for=""><b>Date :  </b>18/04/2019</label>
                    
                    <a href=""><span></span></a>
        </div>
        </div>   
        <br><br>
    </div>       
</div>






@endsection