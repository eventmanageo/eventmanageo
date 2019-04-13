@extends('layouts.header_m')

@section('content')
<div class="container-fluid">
    <input type="hidden" value="{{Request::route('eventId')}}" id="eventId"/>
    <div class="event-detail row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-6"> <label><b>Event Id : </b>{{Request::route('eventId')}}</label> </div>
                <div class="col-6"><label><b>Event Name : </b> {{$name}}</div>
            </div>
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
    <div class="div-item row mt-2"></div>
</div>
<script>
    $(document).ready(function(){
        var vendorType = "caterer";
        var eventId = $('#eventId').val();
        $.ajax({
            url: '/em/getItem',
            type: 'GET',
            data: {vendorType: vendorType, eventId: eventId},
            success: function(res) {
                if (res === "") {
                    $(".div-item").append('<div class="col">Nothing to show</div>');
                } else {
                    var jsonres = JSON.parse(res);
                    if (jsonres.length > 0) {
                        $.each(jsonres, function(key,value){
                            if (vendorType === "caterer"){
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p><a class="delete" data-value="'+value.ucid+'" href="#" onclick="deleteItem('+value.ucid+')">Delete</a></div></div></div>');
                            } else {
                                $(".div-item").append('<div class="col">Nothing to show</div>');
                            }
                        });
                    } else {
                        $(".div-item").append('<div class="col">There\'s nothing is bag, please add item to bag. </div>');
                    }
                }
            }
        });
        $('#vendorType').on('change', function(){
            $('.div-item').empty();
            var vendorType = $(this).val();
            var eventId = $('#eventId').val();
            $.ajax({
               url: '/em/getItem',
               type: 'GET',
               data: {vendorType: vendorType, eventId: eventId},
               success: function(res) {
                    var jsonres = JSON.parse(res);
                    if (jsonres.length === 0) {
                        $(".div-item").append('<div class="col">There\'s nothing is bag, please add item to bag. </div>');
                    } else {
                        $.each(jsonres, function(key,value){
                            if (vendorType === "caterer" ) {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p><a class="delete" data-value="'+value.ucid+'" href="#" onclick="deleteItem('+value.ucid+')">Delete</a></div></div></div>');
                            } else if (vendorType === "photographer"){
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else if (vendorType === "makeup") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.package_name+'</label></div><p class="card-text">'+value.package_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else if (vendorType === "sound") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.service_name+'</label></div><p class="card-text">'+value.service_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else if (vendorType === "transport") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.vehicle_name+'</label></div><p class="card-text">'+value.vehicle_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else if (vendorType === "land") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.land_name+'</label></div><p class="card-text">'+value.land_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else if (vendorType === "decorator") {
                                $(".div-item").append('<div class="col-sm-3"><div class="card"><img class="card-img-top" src="{{asset("images/94447876EsTMra.jpg")}}" alt="Card image" style="width:100%; height:150px;"/><div class="card-body"><div class="card-tile"><label class="h4">'+value.item_name+'</label></div><p class="card-text">'+value.item_description+'</p><a class="delete" data-value="'+value.id+'" href="#" onclick="deleteItem('+value.id+')">Delete</a></div></div></div>');
                            } else {
                                $(".div-item").append('<div class="col">There\'s nothing is bag, please add item to bag. </div>');
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
            url: '/em/removeItem',
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