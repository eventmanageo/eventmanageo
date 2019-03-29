@extends('layouts.header_u1')

@section('content')
@foreach($profile as $data)
<div class="container">
    <div class="row">
    <div class="col">name : </div>
    <div class="col-sm">{{ $data -> name }}</div>
    </div>
    <div class="row">
    <div class="col">Email ID : </div>
    <div class="col-sm">{{ $data -> email }}</div>
    </div>
    <div class="row">
    <div class="col">contact : </div>
    <div class="col-sm">{{ $data -> contact }}</div>
    </div>
    <div class="row">
    <div class="col">Address : </div>
    <div class="col-sm">{{ $data -> address }}</div>
    </div>
</div>
@endforeach
@endsection