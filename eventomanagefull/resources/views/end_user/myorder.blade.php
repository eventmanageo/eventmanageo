@extends('layouts.header_u')

@section('content')
<div class="container-fluid">
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        @foreach($eventDetails as $value)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$value->event_name}}</h4>
                    <p class="card-text"><b>Event Type :</b> {{$value->event_type}}</p>
                    <p class="card-text"><b>From : </b> {{$value->event_date_from}} <b>To : </b> {{$value->event_date_to}} </p>
                    <p class="card-text"><b>Event Status :</b> {{$value->event_status}}</p>
                    <p class="card-text"><b>Created At :</b> {{$value->created_at}}</p>
                    <a href="/myorder/viewevent/{{$value->id}}" class="card-link" style="color: blue;">View Event</a>
                </div>
            </div>
        @endforeach
        </ul>
    </div>
</div>
@endsection