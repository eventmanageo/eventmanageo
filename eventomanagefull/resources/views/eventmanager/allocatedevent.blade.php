@extends('layouts.header_m')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                <strong>Allocated Events</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a href=""><img src="{{asset('images/1480932610419392.jpg')}}" alt="This is service image"/></a>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-center bg-primary">
                    <strong><label>Event Name</label></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <strong><label>Event Date</label></strong>
                </div>
                <div class="col-md-4 text-center">
                    <strong><label>Party Name</label></strong>
                </div>
                <div class="col-md-4 text-center">
                    <strong><label>Primary Contant Number</label></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong><label>Event type with requested services</label></strong>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href=""><strong><i class="fa fa-pencil-alt" data-toggle="tooltip" title="Click to view services in brief"></i></strong></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href=""><strong><i class="fa fa-pencil" data-toggle="tooltip" title="Click to view contact details"></i></strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection