@extends('layouts.header_u1')

@section('content')

<div class="container">
<h3>pakages caterer</h3>



  @foreach($p_caterer as $data)
 
  <div class="card">
    <div class="card-header" id="head_pakages"><strong>
        {{  $data -> package_name }}
        </strong>
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

        @foreach($p_services as $data)
        <p>{{ $data -> item_name }}</p>
        @endforeach
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

  
  @endforeach


      

 </div>

@endsection