@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>transport</h3>
  <div class="row">
  @foreach($transports as $data)
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $data -> vehicle_name }}</h5>
            <p class="card-text">{{ $data -> vehicle_description }}</p>
            <div><p>service ${{ $data -> vehicle_type }}</p></div>
            <div><p style="">Price ${{ $data -> vehicle_price }} </p></div>
            <a href="#" class="btn btn-success">Add to cart</a>
          </div>
       </div>
      </div>
      @endforeach
  </div>
 </div>

@endsection