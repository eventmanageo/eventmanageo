@extends('layouts.header_u')



@section('content') 
@foreach($profile as $data)
<div class="container" style="padding: 10px;box-shadow: 5px 10px 8px #888888">

<div class="row">
  
  

  <div class="col-8">
            <div class="row">
            <div class="col-sm"><b>Name : </b>{{ $data -> name }}</div>
            </div>
          
            <div class="row">
            
            <div class="col-sm"><b>Email Id : </b>{{ $data -> email }}</div>
            </div>
            <div class="row">
            
            <div class="col-sm"><b>Contact No : </b>{{ $data -> contact }}</div>
            </div>
            <div class="row">
            <div class="col-sm"><b>Address : </b>{{ $data -> address }}</div><br>
            </div>
            <div class="row"><br>
            <button class="btn btn-danger" style="margin-left:20px;margin-top:10px;"><a href ="">Update data</a></button>
            </div>
</div>
  
  
  </div>
</div>





    
@endforeach

@endsection

 
