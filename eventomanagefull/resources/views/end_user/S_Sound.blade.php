@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>sound Dj</h3>


<div class="row">
  @foreach($sound as $data)
  <form action="/sound_DJ" method="POST">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="col-sm">
      <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            
            <h5 class="card-title">{{ $data -> service_name }}</h5>
            <p class="card-text">{{ $data -> service_description }}</p>
            <div><p style="">Price ₹{{ $data -> service_price }} </p></div>
            <div><p style="">Type {{ $data -> service_type }} </p></div>
            

            <input type="text" name="sound" value="sound/DJ" hidden/>
            <input type="text" name="sound_id" value="{{ $data -> id }}" hidden/>
            <input type="text" name="sound_name" value="{{ $data -> service_name }}" hidden/>
            <input type="text" name="description" value="{{ $data -> service_description }}" hidden/>
            <input type="text" name="price" value="{{ $data -> 	service_price }}" hidden/>


            <input type="submit" class="btn btn-success" name="addtocart" value="Add to cart" />
           
          </div>
       </div>
    </div>
  </form>

  
  @endforeach


      
  </div>
 </div>

@endsection