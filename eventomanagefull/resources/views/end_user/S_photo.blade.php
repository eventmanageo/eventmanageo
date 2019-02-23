@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>Photography</h3>
  <div class="row">
  @foreach($photgraph as $data)
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $data -> package_name }}</h5>
            <p class="card-text">{{ $data -> package_description }}</p>
            <div><p style="">package Price ${{ $data -> package_price }} </p></div>
            <a href="#" class="btn btn-success">Add to cart</a>
          </div>
       </div>
      </div>
      @endforeach
  </div>
 </div>

@endsection