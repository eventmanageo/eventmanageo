@extends('layouts.header_u')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col text-center"><label><b>Event Item Details</b></label></div>
    </div>
    <div class="row">
        <div class="col">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">Caterer</a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userCaterer as $uc)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$uc->package_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Package Description : </b>{{$uc->package_description}}</div>
                                            <div class="col"><b>Package Dine Time : </b>{{$uc->package_dine_time}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>No of people </b><br/>{{$uc->no_of_people}}</div>
                                            <div class="col"><b>Date when to serve </b><br/>{{$uc->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$uc->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$uc->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseTwo">Makeup</a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userMakeup as $um)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$uc->package_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Package Description : </b>{{$um->package_description}}</div>
                                            <div class="col"><b>Package For : </b>{{$um->package_for}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>No of people </b><br/>{{$um->no_of_people}}</div>
                                            <div class="col"><b>Date when to serve </b><br/>{{$um->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$um->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$um->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseThree">Photographer</a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userPhotographer as $up)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$up->package_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Package Description : </b>{{$up->package_description}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>Date when to serve </b><br/>{{$up->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$up->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$up->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseFour">Decorator</a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userDecorator as $ud)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$ud->item_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Item Description : </b>{{$ud->item_description}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>Date when to serve </b><br/>{{$ud->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$ud->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$ud->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseFive">Sound/DJ</a>
                    </div>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userSound as $us)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$us->service_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Service Description : </b>{{$us->service_description}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>Date when to serve </b><br/>{{$us->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$us->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$us->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseSix">Transport</a>
                    </div>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userTransport as $ut)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$ut->vehicle_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Vehicle Description : </b>{{$ut->vehicle_description}}</div>
                                            <div class="col"><b>Vehicle Type : </b>{{$ut->vehicle_type}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>Date when to serve </b><br/>{{$ut->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$ut->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$ut->special_note}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <b>No of Vehicle </b> <br/>{{$ut->no_of_vehicle}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseSeven">Land</a>
                    </div>
                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            @foreach($userLand as $ul)
                                <div class="row border mt-1">
                                    <div class="col-3" style="display: flex; align-items: center; justify-content: center;">{{$ul->land_name}}</div>
                                    <div class="col">
                                        <div class="row text-center">
                                            <div class="col"><b>Description : </b>{{$ul->land_description}}</div>
                                            <div class="col"><b>Address : </b>{{$ul->land_address}}</div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col"><b>Date when to serve </b><br/>{{$ul->date_when_to_serve}}</div>
                                            <div class="col"><b>Time when to serve </b><br/>{{$ul->time_when_to_serve}}</div>
                                            <div class="col"><b>Special note </b><br/>{{$ul->special_note}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection