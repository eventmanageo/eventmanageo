@extends('layouts.header_u1')

@section('content')

<div class="container">



<div class="row">
  @foreach($transport as $data)
  <form action="/transport_store" method="POST">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            
            <h5 class="card-title">{{ $data -> vehicle_name }}</h5>
            <p class="card-text">{{ $data -> vehicle_description }}</p>
            <div><p style="">Price ${{ $data -> vehicle_price }} </p></div>
            <div><p style="">Type {{ $data -> vehicle_type }} </p></div>
            

            <input type="text" name="transport" value="transport" hidden/>
            <input type="text" name="transport_id" value="{{ $data -> id }}" hidden/>
            <input type="text" name="transport_name" value="{{ $data -> vehicle_name }}" hidden/>
            <input type="text" name="description" value="{{ $data -> vehicle_description }}" hidden/>
            <input type="text" name="price" value="{{ $data -> 	vehicle_price }}" hidden/>


            <input type="submit" class="btn btn-success" name="addtocart" value="Add to cart" />
           
          </div>
       </div>
    </div>
  </form>

  
  @endforeach


      
  </div>
 </div>

@endsection