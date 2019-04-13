@extends('layouts.header_a')


@section('content') 
@foreach($contact as $data)
<div class="container" style="padding: 10px;box-shadow: 5px 10px 8px #888888">
    <div class="row">
   
    <div class="col-sm">Name : {{ $data -> name }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Email Id : {{ $data -> email }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Subject : {{ $data -> subject }}</div>
    </div>
    <div class="row">
    
    <div class="col-sm">Description : {{ $data -> Description }}</div>
    </div>
</div>
@endforeach

@endsection
