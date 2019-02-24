@extends('layouts.header_u1')

@section('content')
<!-- table heading display -->
<div class="container">
    <div class="row" id="cartview_raw">
        <div class="col">id</div>
        <div class="col">Name</div>
        <div class="col">Description</div>
        <div class="col">Price</div>
        <div class="col">Action</div>    
    </div>
    @foreach($view_service as $data)
    <div class="row border-bottom" id="cartview_raw1">
        <div class="col">{{ $data -> id }}</div>
        <div class="col">{{ $data -> service_name }}</div>
        <div class="col">{{ $data -> Description }}</div>
        <div class="col">{{ $data -> price }}</div>
        <div class="col"><a href = 'deleted_caterer/{{ $data->id }}' class="btn btn-secondary">Remove</a></div> 
          
    </div>
    @endforeach

</div>
@endsection
