@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>catering</h3>



<div class="row">
  @foreach($catering as $data)
  <form action="/catering_store" method="POST">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            
            <h5 class="card-title">{{ $data -> item_name }}</h5>
            <p class="card-text">{{ $data -> item_description }}</p>
            <div><p style="">Price ₹{{ $data -> item_price }} </p></div>

            <input type="text" name="caterer" value="caterer" hidden/>
            <input type="text" name="caterer_id" value="{{ $data -> id }}" hidden/>
            <input type="text" name="service_name" value="{{ $data -> item_name }}"hidden/>
            <input type="text" name="description" value="{{ $data -> item_description }}" hidden/>
            <input type="text" name="price" value="{{ $data -> item_price }}" hidden/>


            <input type="submit" class="btn btn-success" name="addtocart" value="Add to cart" />
           
          </div>
       </div>
    </div>
  </form>

  
  @endforeach


      
  </div>
 </div>

@endsection