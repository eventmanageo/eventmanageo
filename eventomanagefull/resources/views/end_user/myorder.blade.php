@extends('layouts.header_u')

@section('content')
<div class="container-fluid">
<div class="shadow-sm p-3 mb-5 bg-white rounded">
        <table class="table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th>Event Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($eventDetails as $value)
                <tr>
                    <td>{{$value->event_name}}</td>
                    <td>{{$value->event_type}}</td>
                    <td>{{$value->event_status}}</td>
                    <td><a href="/mybag/{{$value->id}}" id="view-event" data-toggle="tooltip" title="View Details"><i class="fa fa-eye"></i></a>
                        @if($value->event_status == "created")
                            <a href="#" class="confirm-event" data-value="{{$value->id}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-check-circle"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection