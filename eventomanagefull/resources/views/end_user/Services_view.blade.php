@extends('layouts.header_u1')

@section('content')
   @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

<!-- table heading display -->
<?php $total = 0 ?>
<div class="container">
    <div class="row" id="cartview_raw">
        <div class="col">id</div>
        <div class="col">Name</div>
        <div class="col">Description</div>
        <div class="col">Price</div>
        <div class="col">Action</div>    
    </div>
   
    
    @foreach($view_service as $data)

    
    <div class="row border-bottom" id="cart">
        <div class="col">{{ $data -> id }}</div>
        <div class="col">{{ $data -> service_name }}</div>
        <div class="col">{{ $data -> Description }}</div>
        <div class="col">{{ $data -> price }}</div>
        <div class="col"><a href = 'deleted_caterer/{{ $data->id }}' class="btn btn-secondary">Remove</a></div> 
    
    </div>
 
    @endforeach
    
<div>
     <?php 
     $username = Auth::user()->name;
     $userid = Auth::user()->id;

     $total = DB::table('added_carts')->where('user_id', '=', $userid)->sum('price');
    //  $total = DB::select("SELECT SUM(price) FROM added_carts where user_id='$userid' AND username='$username' "); 
    ?>

        <div class="row" id="total">
            <div class="col"><a href = "{{ url('catering') }}" class="btn btn-primary">back to services</a></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"><strong>Total : {{ $total }}</strong></div>
            <div class="col"></div> 
    
        </div>
    </div>


</div>


@endsection
