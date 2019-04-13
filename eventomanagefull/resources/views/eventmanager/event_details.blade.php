@extends('layouts.header_m')

@section('content')
  <div class="container-fluid">
    <div class="alert alert-success text-center">
      <b>Event Details</b>
    </div>
    @foreach($eventDetails as $item)
    <div class="row">
      <div class="col-6 text-left"><b>Event Name : </b>{{$item->event_name}}</div>
      <div class="col text-right"><b>Event Id : </b>{{$item->id}}</div>
    </div>
    <hr/>
    <div class="row mt-2">
      <div class="col-6 text-left"><b>Event Type : </b>
        @if($item->event_type === "marriagegroom")
          <label>Marriage of Groom</label>
        @elseif ($item->event_type === "marriagebride")
          <label>Marriage of Bride</label>
        @endif
      </div>
      <div class="col-6 text-left">
        <b>Event Location : </b> {{$item->event_location}}
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-6 text-left">
        <b>Event From : </b> {{$item->event_date_from}}
      </div>
      <div class="col-6 text-left">
        <b>Event To : </b> {{$item->event_date_to}}
      </div>
    </div>
    @endforeach
  </div>
@endsection