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
                            <a href="#" class="delete-event" data-value="{{$value->id}}"><i class="fa fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirm your event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <b>Terms and Condition</b>
                <br/>
                <code>
                    Here by you declare that you accept all our terms and conditions.
                    You have to made half payment here, then half payment after the completion of event.
                </code>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" class="btn btn-success" data-dismiss="modal">Confirm</button>
            </div>
        
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.confirm-event').on('click',function() {
            eId = $(this).attr('data-value');
        });

        $('.delete-event').on('click', function() {
            eId = $(this).attr('data-value');
            console.log(eId);
            var dStatus = confirm('Are you sure ?');
            if (dStatus) {
                $.ajax({
                    url: 'user/deleteEvent',
                    type: 'GET',
                    data: {eventId: eId},
                    success: function(res){
                        if (res == "ok") {
                            alert('Successfully Deleted');
                            window.location.href = '/mybag'
                        } else {
                            alert('Failed');
                        }
                    }
                });
            }
            
        });

        $('#btnSubmit').on('click', function() {
            $.ajax({
                url: '/publishEvent',
                type: 'GET',
                data: {eventId: eId},
                success: function(res){
                    if (res == "ok") {
                        alert('Successfully Published');
                        window.location.href = '/user/bill_generation/'+eId;
                    } else {
                        alert('Failed');
                    }
                }
            })
        });
    });
</script>
@endsection