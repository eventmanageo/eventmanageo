@extends('layouts.header_u1')

@section('content')

<div class="container">



<div class="row">
  @foreach($decorator as $data)
  <form action="/decoration" method="POST">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            
            <h5 class="card-title">{{ $data -> item_name }}</h5>
            <p class="card-text">{{ $data -> item_description }}</p>
            <div><p style="">Price ₹{{ $data -> item_price }} </p></div>
            
            

            <input type="text" name="decorator" value="decorator" hidden/>
            <input type="text" name="decorator_id" value="{{ $data -> id }}" hidden/>
            <input type="text" name="decorator_name" value="{{ $data -> item_name }}" hidden/>
            <input type="text" name="description" value="{{ $data -> item_description }}" hidden/>
            <input type="text" name="price" value="{{ $data -> 	item_price }}" hidden/>


            <input type="submit" class="btn btn-success" name="addtocart" value="Add to cart" />
           
          </div>
       </div>
    </div>
  </form>

  
  @endforeach


      
  </div>
 </div>

@endsection