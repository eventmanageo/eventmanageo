@extends('layouts.header_u')

@section('content')
<div class="container-fluid">
    <input type="hidden" value="{{$eventId}}" id="eventId"/>
    <div class="event-detail row">
        <div class="col-sm-6">
            <label><b>Event Id: </b>{{$eventId}}</label>
        </div>
        <div class="col-sm-6">
            <select class="form-control" id="vendorType" name="vendorType">
                <option value="caterer">Caterer</option>
                <option value="makeup">Makeup</option>
                <option value="photographer">Photographer</option>
                <option value="decorator">Decoration</option>
                <option value="transport">Transport</option>
                <option value="sound">Sound</option>
                <option value="land">Land</option>
            </select>
        </div>
    </div>
    <div class="div-item row"></div>
</div>
<script>
    $(document).ready(function(){
        var vendorType = "caterer";
        var eventId = $('#eventId').val();
        $.ajax({
            url: '/getItem',
            type: 'GET',
            data: {vendorType: vendorType, eventId: eventId},
            success: function(res) {
                if (res === "") {
                    $(".div-item").append('<div class="col">Nothing to show</div>');
                } else {
                    var jsonres = JSON.parse(res);
                    $.each(jsonres, function(key,value){
                        if (vendorType === "caterer" || vendorType === "photographer" || vendorType === "makeup") {
                            $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p><a class="delete" data-value="'+value.ucid+'" href="#" onclick="deleteItem('+value.ucid+')">Delete</a></div></div></div>');
                        } else {
                            
                        }
                    });
                }
            }
        });
        $('#vendorType').on('change', function(){
            $('.div-item').empty();
            var vendorType = $(this).val();
            var eventId = $('#eventId').val();
            $.ajax({
               url: '/getItem',
               type: 'GET',
               data: {vendorType: vendorType, eventId: eventId},
               success: function(res) {
                   if (res === "") {
                        $(".div-item").append('<div class="col">Nothing to show</div>');
                   } else {
                        var jsonres = JSON.parse(res);
                        console.log(jsonres);
                        $.each(jsonres, function(key,value){
                            if (vendorType === "caterer" || vendorType === "photographer" || vendorType === "makeup") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p></div></div></div>');
                            } else if (vendorType === "sound") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.service_name+'</label></div><p class="card-text">'+value.service_description+'</p></div></div></div>');
                            } else if (vendorType === "transport") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.vehicle_name+'</label></div><p class="card-text">'+value.vehicle_description+'</p></div></div></div>');
                            } else if (vendorType === "land") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.land_name+'</label></div><p class="card-text">'+value.land_description+'</p></div></div></div>');
                            } else if (vendorType === "decorator") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.item_name+'</label></div><p class="card-text">'+value.item_description+'</p></div></div></div>');
                            } else {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.item_name+'</label></div><p class="card-text">'+value.item_description+'</p></div></div></div>');
                            }
                        });
                   }
                }
            });
        });

    });

    function deleteItem(itemId) {
        var vendorType = document.getElementById('vendorType').value;

        $.ajax({
            url: '/removeItem',
            type: 'GET',
            data: {vendorType: vendorType, itemId: itemId},
            success: function(res) {
                if (res === "ok" ) {
                    alert('Success');
                    location.reload(true);
                } else if (res === "notok") {
                    alert('Failed');
                }
            }
        });
    }
</script>
@endsection