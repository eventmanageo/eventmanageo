@extends('layouts.header_v')

@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>Event Id</th>
            <th>Package Id</th>
            <th>Number of people</th>
            <th>Date When to serve</th>
            <th>Time When to serve</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td class="event-id" style="cursor:pointer;">{{$item->event_id}}</td>
                <td>{{$item->package_id}}</td>
                <td>{{$item->no_of_people}}</td>
                <td>{{$item->date_when_to_serve}}</td>
                <td>{{$item->time_when_to_serve}}</td>
            </tr>
        @endforeach
    </table>
</div>
<script>
    $(document).ready(function() {
        $('.event-id').on('click', function() {
            eventId = $(this).text();
            $.ajax({
                url: '/eventDetails',
                type: 'GET',
                data: {eventId: eventId},
                success: function(res) {
                    var json = JSON.parse(res);
                    alert('Event Name : '+json[0].event_name+"\n"+"Event Type : "+json[0].event_type+"\n"+"Event Location : "+json[0].event_location+
                    "\nContact Person : "+json[0].name+"\nContact Number : "+json[0].contact+"\n Address : "+json[0].address);
                }
            });
        });
    });
</script>
@endsection