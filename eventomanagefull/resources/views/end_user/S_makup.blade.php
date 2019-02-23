@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>makeup and hair</h3>
  <div class="row">
  @foreach($makeup as $data)
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $data -> item_name }}</h5>
            <p class="card-text">{{ $data -> item_description }}</p>
            <div><p style="">Price ${{ $data -> item_price }} </p></div>
            <a href="#" class="btn btn-success">Add to cart</a>
          </div>
       </div>
      </div>
      @endforeach
  </div>
 </div>

@endsection