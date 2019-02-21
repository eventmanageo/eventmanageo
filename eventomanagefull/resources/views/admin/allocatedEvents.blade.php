@extends('layouts.header_a')

@section('content')
<div class="container">
    @if($eventDetails->isEmpty())
        <label>No events allocated</label>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Assigned To</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventDetails as $key => $event)
                <tr>
                    <td><label>{{$eventDetails[$key]->id}}</label></td>
                    <td><label>{{$eventDetails[$key]->event_name}}</label></td>
                    <td><label>
                        {{-- <form action="#" id="eventmanagerId"  style="display: inline-block;">
                            <input type="hidden" name="eid" id="eid" value="{{$eventDetails[$key]->event_manager_id}}"/> --}}
                            <input id="btn" type="button" class="btn btn-warning" value="Get Manager Details" onclick="getDetails({{$eventDetails[$key]->event_manager_id}})"/>
                        {{-- </form> --}}
                        <label>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<script>
    function getDetails(id) {
        $.ajax({
            type : 'GET',
            data : {eid : id},
            url : '/getEventManagerName',
            beforeSend : function(data){
            },
            success : function(response){
                console.log(response);
                alert(response);
            },
            complete : function(data){
            }
        });
    }
</script>
@endsection