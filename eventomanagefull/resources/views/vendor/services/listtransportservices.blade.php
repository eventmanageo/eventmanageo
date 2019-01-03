@extends('layouts.header_v')

@section('content')
@if(Session::has('status-success'))
    <script>
        alert('Successfully Deleted');
    </script>
@endif
@if(Session::has('status-failed'))
    <script>
        alert('Failed');
    </script>
@endif
@if(Session::has('status-edit-success'))
    <script>
        alert('Successfully Edited');
    </script>
@endif
<div class="container">
    @if($serviceBunch === "Empty")
        <label>Looks like you are empty with services. <a href="/{{$vendorType}}/add/service"><i class="fas fa-plus-circle"></i></a></label>
    @else
    <div id="products" class="row grid-group">
        @foreach ($serviceBunch as $service)
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <a href="#">
                        <img class="group list-group-image" src="{{asset('images/1480932610419392.jpg')}}" alt="No Image" />
                    </a>
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">{{$service->vehicle_name}}</h4>
                        <p class="group inner list-group-item-text">{{$service->vehicle_description}} | {{$service->vehicle_type}}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead"><i class="fas fa-rupee-sign"></i> {{$service->vehicle_price}}</p>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('[data-toggle="tooltip"]').tooltip(); 
                                });
                            </script>
                            <div class="col-xs-12 col-md-6">
                                <a href="/edit/service/{{$service->id}}/{{$vendorType}}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <span>&nbsp; &nbsp;</span>
                                <form id="deleteForm{{$service->id}}" name="deleteForm{{$service->id}}" action="/delete/service" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$service->id}}"/>
                                    <input type="hidden" id="vendorType" name="vendorType" value="{{$vendorType}}"/>
                                    <a href="javascript:{}" onclick="document.getElementById('deleteForm{{$service->id}}').submit();" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
@endsection