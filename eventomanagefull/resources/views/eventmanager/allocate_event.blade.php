@extends('layouts.header_m')

@section('content')

<!-- Custom CSS -->
<style type="text/css">
.container {
    max-width: 1300px;
}

.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

#logo {
  background-color: #8bffff;
  position:relative;
  border-radius: 15px / 15px;
  float: left;
  padding: 10px;
 
    
}

#logo a span { 
position:absolute; 
  width:85%;
  height:85%;
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

        @foreach ($users as $value)
        
        <div id="logo" class="w-25 p-3" style="margin-left:10px; margin-top:10px;">
                    <label for=""><b>Client Id :  </b>{{ $value->name }}</label><br><br>
                    <label for=""><b>Event Name :  </b>{{ $value->event_name}}</label><br><br>
                    <label for=""><b>Date :  </b>{{ $value->event_date_to}} to {{ $value->event_date_from}}</label>
                    <br/>
                    <a href="/view_detail/{{$value->eid}}">View Detail</a>
                    <a href="/confirm/{{$value->eid}}">Completed</a>
        </div>
     
        @endforeach
     


        </div>   

        <br><br>
    </div>       
</div>






@endsection