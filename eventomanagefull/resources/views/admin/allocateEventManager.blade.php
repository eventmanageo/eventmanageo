@extends('layouts.header_a')

@section('content')
<div class="container">
    @if($eventDetails->isEmpty())
        <label>No events requested</label>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Checkin</th>
                <th>Chekout</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventDetails as $key => $event)
                <tr>
                    <td><label>{{$eventDetails[$key]->id}}</label></td>
                    <td><label>{{$eventDetails[$key]->event_name}}</label></td>
                    <td><label>{{$eventDetails[$key]->event_type}}</label></td>
                    <td><label>{{$eventDetails[$key]->event_date_from}}<label></td>
                    <td><label>{{$eventDetails[$key]->event_date_to}}<label></td>
                    <td><input class="btn btn-warning mb-1" type="button" id="allocatemanager" name="allocatemanager" value="Allocate Manager" data-toggle="modal" data-target="#myModal"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Allocate Manager</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body container">
            *Please select appropriate event manager
            <br/><br>
            <strong id="loading-message">Loading Data...</strong>
            <select id="eventmanagerlist" class="form-control w-50" name="eventmanagerlist"></select>
        </div>
    
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" id="btnSubmit" class="btn btn-success" data-dismiss="modal">Submit</button>
        </div>
    
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#allocatemanager").on('click',function(){
            item = $(this).closest('tr').find('td:nth-child(1)').text();
            $("#eventmanagerlist").find('option').remove();
            $("#eventId").text('Id : '+item);
            $body = $("body");
            $.ajax({
                type : 'GET',
                url : '/getEventManagerListAjax',
                beforeSend : function(data){
                    $("#eventmanagerlist").hide();
                    $("#loading-message").show();
                },
                success : function(response){
                    json = JSON.parse(response);
                    for (var eachobject = 0 ; eachobject< json.length ; eachobject++){
                        var jsonObject = json[eachobject];
                        $("#eventmanagerlist").append($('<option></option>').attr("value",jsonObject.id).text(jsonObject.name));
                    }
                },
                complete : function(data){
                    $("#eventmanagerlist").show();
                    $("#loading-message").hide();
                }
            });
        });

        $("#btnSubmit").on('click',function(){
            var eventmanagerId = $("#eventmanagerlist").val();
            var eventId = item;

            $.ajax({
                url : '/checkEventManagerAvailability',
                type : 'GET',
                data : {eId: eventmanagerId , eventId : eventId},
                success : function(response){
                    if(response === "notok"){
                        alert('Event manager is busy on other event');
                    }else if(response === "notokwentwrong"){
                        alert('Looks like there is some problem : or event already assigned ');
                    }else if(response === "ok"){
                        alert("Assigned");
                    }else{
                        alert('Some thing went wrong');
                    }

                    location.reload();
                }
            });

        });
    });
</script>
@endsection