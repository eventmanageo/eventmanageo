@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>Sound /DJ</h3>
  <div class="row">
  @foreach($sound as $data)
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $data -> service_name }}</h5>
            <p class="card-text">{{ $data -> service_description }}</p>
            <div><p>service ${{ $data -> service_type }}</p></div>
            <div><p style="">Price ${{ $data -> service_price }} </p></div>
            <a href="#" class="btn btn-success">Add to cart</a>
          </div>
       </div>
      </div>
      @endforeach
  </div>
 </div>

@endsection