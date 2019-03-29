@extends('layouts.header_u')

@section('content')
    <div class="container-fluid">
        <input type="hidden" id="userid" value="{{Auth::user()->id}}"/>
        <input type="hidden" id="vendorType" value="{{Request::route('vendorType')}}"/>
        <div style="text-align:center;">
            <div style="display: inline-block; ">
                <a href="/services/caterer" class="active-service {{($vendorType=='caterer' ? 'active-tag' : '')}}">Caterer</a>
                <a href="/services/makeup" class="active-service {{($vendorType=='makeup' ? 'active-tag' : '')}}">Make-up</a>
                <a href="/services/transport" class="active-service {{($vendorType=='transport' ? 'active-tag' : '')}}">Transport</a>
                <a href="/services/photographer" class="active-service {{($vendorType=='photographer' ? 'active-tag' : '')}}">Photographer</a>
                <a href="/services/decorator" class="active-service {{($vendorType=='decorator' ? 'active-tag' : '')}}">Decorator</a>
                <a href="/services/land" class="active-service {{($vendorType=='land' ? 'active-tag' : '')}}">Land</a>
                <a href="/services/sound" class="active-service {{($vendorType=='sound' ? 'active-tag' : '')}}">Sound</a>
            </div>
        </div>
        <div style="width:100%; height:100%; overflow:hidden;">
            @if($vendorType == "caterer")
                <div class="row mt-3">
                    @foreach ($packageData as $item )
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <a href="/services/caterer/{{$item->id}}/{{$item->vendor_id}}"><img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"></a>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->package_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->package_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif ($vendorType == "makeup")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <a href="/services/makeup/{{$item->id}}/{{$item->vendor_id}}"><img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"></a>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->package_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->package_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            @elseif ($vendorType == "photographer")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <a href="/services/photographer/{{$item->id}}/{{$item->vendor_id}}"><img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"></a>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->package_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->package_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($vendorType == "transport")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;">
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->vehicle_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->vehicle_description}}
                                    </p>
                                    <a href="#add" data-value="{{$item->id}}" id="add-package" href="#add" style="color:green;" data-toggle="modal" data-target="#myModal">Add to bag</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($vendorType == "decorator")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;">
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->item_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->item_description}}
                                    </p>
                                    <a href="#add" data-value="{{$item->id}}" id="add-package" href="#add" style="color:green;" data-toggle="modal" data-target="#myModal">Add to bag</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($vendorType == "land")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;">
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->land_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->land_address}}
                                    </p>
                                    <a href="#add" data-value="{{$item->id}}" id="add-package" href="#add" style="color:green;" data-toggle="modal" data-target="#myModal">Add to bag</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($vendorType == "sound")
                @foreach ($packageData as $item )
                    <div class="row mt-3">
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;">
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->service_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->service_description}}
                                    </p>
                                    <a href="#add" data-value="{{$item->id}}" id="add-package" href="#add" style="color:green;" data-toggle="modal" data-target="#myModal">Add to bag</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script type="text/javascript">
        function showModalAgain() {
            $('#myModal').on('hide.bs.modal', function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false; 
            });
        }
        $(document).ready(function(){
            $('#add-package').click(function(){
                service_id = $(this).attr('data-value');

                $("#eventlist").find('option').remove();
                $.ajax({
                    type: 'GET',
                    url: '/getevents',
                    data: {userid: $("#userid").val()},
                    dataType: 'JSON',
                    beforeSend : function(data){
                        $("#eventlist").hide();
                        $("#loading-message").show();
                    },
                    success: function(res) {
                        for (var eachobject = 0 ; eachobject< res.length ; eachobject++){
                            var jsonObject = res[eachobject];
                            $("#eventlist").append($('<option></option>').attr("value",jsonObject.id).text(jsonObject.event_name));
                        }
                    },
                    complete : function(data){
                        $("#eventlist").show();
                        $("#loading-message").hide();
                    }
                });
            });
            
            $('#btnSubmit').click(function(e){
                var eventId = $("#eventlist").val();
                var serviceId = service_id;
                var vendorType = $('#vendorType').val();
                var date = $('#datepicker').val();
                var time = $('#time').val();
                var sn = $('#specialnote').val();
                if (date == "" || date == null) {
                    alert('Input date');
                }else if (time==null || time==""){
                    alert('Input time');
                } else if (sn == "" || sn == null) {
                    alert('Input special note');
                } else {
                    if (vendorType === "decorator") {
                        dataIn = {pId: serviceId , eId : eventId, vType: vendorType, d: date, t: time, snote: sn}
                    } else if (vendorType === "transport") {
                        var noofvehicle = $('#noofvehicle').val();
                        dataIn = {pId: serviceId , eId : eventId, nV: noofvehicle, vType: vendorType, d: date, t: time, snote: sn}
                    } else if (vendorType === "land") {
                        dataIn = {pId: serviceId , eId : eventId, vType: vendorType, d: date, t: time, snote: sn}
                    } else if (vendorType === "sound") {
                        dataIn = {pId: serviceId , eId : eventId, vType: vendorType, d: date, t: time, snote: sn}
                    }

                    $.ajax({
                        url : '/saveToEvent',
                        type : 'GET',
                        data : {data: dataIn},
                        success: function(res){
                            console.log(res);
                            if (res === "ok") {
                                alert('Successful');
                            } else if (res === "notok") {
                                $('#myModal').on('hide.bs.modal', function(e){
                                    e.preventDefault();
                                    e.stopImmediatePropagation();
                                    return false; 
                                });
                                alert('Failed to Add');
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    </script>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add to bag</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                *Please select appropriate event
                <br/>
                <strong id="loading-message">Loading Data...</strong>
                <select id="eventlist" name="eventlist"></select>
                <br/>
                <label>Select time category when to serve</label>
                <br/>
                @if(Request::route('vendorType') == "transport")
                    <input type="number" id="noofvehicle" name="noofvehicle" min=1 max=20 placeholder="Enter no of vehicle" class="form-control"/>
                @endif
                <br/>
                <select id="time" name="time">
                    <option value="morning">Morning 6AM-12AM</option>
                    <option value="afternoon">Afternoon 12PM- 5PM</option>
                    <option value="night">Night 5PM- 3AM</option>
                </select>
                <p>Date to serve: <input type="text" id="datepicker" class="form-control" placeholder="select date"></p>
                <br/>
                <input type="text" id="specialnote" name="specialnote" placeholder="Special note like at what time your event is." class="form-control"/>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" class="btn btn-success" data-dismiss="modal">Submit</button>
            </div>
        
            </div>
        </div>
    </div>
@endsection