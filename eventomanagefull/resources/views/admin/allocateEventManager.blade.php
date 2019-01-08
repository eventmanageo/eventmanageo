@extends('layouts.header_a')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Location</th>
                <th>Checkin</th>
                <th>Chekout</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventDetails as $key => $event)
                <tr>
                    <td><label>{{$eventDetails[$key]->id}}</label></td>
                    <td><label>{{$eventDetails[$key]->type}}</label></td>
                    <td><label>{{$eventDetails[$key]->location}}</label></td>
                    <td><label>{{$eventDetails[$key]->check_in}}<label></td>
                    <td><label>{{$eventDetails[$key]->check_out}}<label></td>
                    <td><input class="btn btn-warning mb-1" type="button" id="allocatemanager" name="allocatemanager" value="Allocate Manager" data-toggle="modal" data-target="#myModal"></td>
                </tr>
            @endforeach
        </tbody>
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
        <div class="modal-body">
            *Please select appropriate event manager
            <br/>
            <select id="eventmanagerlist" name="eventmanagerlist"></select>
        </div>
    
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#allocatemanager").on('click',function(){
            item = $(this).closest('tr').find('td:nth-child(1)').text();
            $("#eventId").text('Id : '+item);
            $.ajax({
                type : 'GET',
                url : '/getEventManagerListAjax',
                success : function(response){
                    json = JSON.parse(response);
                    for (var eachobject = 0 ; eachobject< json.length ; eachobject++){
                        var jsonObject = json[eachobject];
                        $("#eventmanagerlist").append($('<option></option>').attr("value",jsonObject.id).text(jsonObject.name));
                    }
                }
            });
        });

        $("#eventmanagerlist").change(function(){
            alert($(this).val()+" "+item);
        });
    });
</script>
@endsection