@extends('layouts.header_u')

@section('content')
    <div class="container-fluid">
        <input type="hidden" id="userid" value="{{Auth::user()->id}}"/>
        <input type="hidden" id="vendorType" value="{{Request::route('vendorType')}}"/>
        <div class="row">
            @foreach($packageDetails as $item)
                <div class="col-sm-2">
                    <b>Package Name: </b><label>{{$item->package_name}}</label>
                    @if (Request::route('vendorType') == "caterer") 
                        @if($item->package_dine_time == 1)
                            <b>Dine Time: </b><label>Breakfast</label>
                        @elseif($item->package_dine_time == 2)
                            <b>Dine Time: </b><label>Lunch</label>
                        @elseif($item->package_dine_time == 3)
                            <b>Dine Time: </b><label>Dinner</label>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-right">
                <a data-value="{{Request::route('itemId')}}" id="add-package" href="#add" style="color:green;" data-toggle="modal" data-target="#myModal">Add to bag</a>
            </div>
        </div>
        <div style="width:100%; height:100%; overflow:hidden;">
            @if(Request::route('vendorType') == "caterer")
                <div class="row mt-3">
                    @foreach ($catererItem as $item )
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <!-- <a href="/services/caterer/{{Request::route('itemId')}}/{{Request::route('vendorId')}}/{{$item->id}}"><img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"></a> -->
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"/>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->item_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->item_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (Request::route('vendorType') == "makeup")
                <div class="row mt-3">
                    @foreach ($makeupItem as $item )
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"/>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->item_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->item_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (Request::route('vendorType') == "photographer")
                <div class="row mt-3">
                    @foreach ($photographerItem as $item )
                        <div class="col-sm-3 mt-2">
                            <div class="card">
                                <img class="card-img-top" src="{{asset('images/94447876EsTMra.jpg')}}" alt="Card image" style="width:100%; height:150px;"/>
                                <div class="card-body">
                                    <div class="card-tile">
                                        <label class="h4">{{$item->item_name}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$item->item_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add-package').click(function(){
                package_id = $(this).attr('data-value');

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

            $('#btnSubmit').click(function(){
                var eventId = $("#eventlist").val();
                var packageId = package_id;
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
                    if (vendorType === "caterer") {
                        var noofpeople = $('#noofpeople').val();
                        dataIn = {pId: packageId , eId : eventId, vType: vendorType, npeople: noofpeople, d: date, t: time, snote: sn}
                    } else if (vendorType === "makeup") {
                        var noofpeople = $('#noofpeople').val();
                        dataIn = null;
                        dataIn = {pId: packageId , eId : eventId, vType: vendorType, npeople: noofpeople, d: date, t: time, snote: sn}
                    } else if (vendorType === "photographer") {
                        dataIn = null;
                        dataIn = {pId: packageId , eId : eventId, vType: vendorType, d: date, t: time, snote: sn}
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
                @if (Request::route('vendorType') == "caterer" || Request::route('vendorType') == "makeup")
                    <label>No of peopl</label>
                    <input type="number" min="1" id="noofpeople" name="noofpeople" class="form-control"/>
                @endif
                <label>Select time category when to serve</label>
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