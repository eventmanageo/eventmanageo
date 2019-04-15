@extends('layouts.header_u')



@section('content') 
@foreach($profile as $data)
<div class="container" style="padding: 10px;box-shadow: 5px 10px 8px #888888">
    <div class="row">
   
    <div class="col-sm">Name : {{ $data -> name }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Email Id : {{ $data -> email }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Contact No : {{ $data -> contact }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Address : {{ $data -> address }}</div>
    </div>

    <div style="padding-top:2%">
        <button class="btn btn-secondary"><a href="{{ url('user/updateprofile')}}">Update</a></button>
    </div>
</div>
@endforeach





@endsection

 
