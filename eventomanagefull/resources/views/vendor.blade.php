@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <a href="company/details/{{Session::get('vendor_category')}}">Add Company Details</a>
    <a href="{{Session::get('vendor_category')}}/add/service">Add your services</a>
    <a href="{{Session::get('vendor_category')}}/make/package/breakfast">Make package Breakfast</a>
    <a href="{{Session::get('vendor_category')}}/make/package/lunch">Make package Lunch</a>
    <a href="{{Session::get('vendor_category')}}/make/package/dinner">Make package Dinner</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <label><span><strong>{{Session::get('vendor_category')}}</strong></span>'s dashboard</label>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border">
                            <label>Here Pending Order Count</label>
                        </div>
                        <div class="col-md-4 border">
                            <label>Here Completed Order Count</label>
                        </div>
                        <div class="col-md-4 border">
                            <label>Here Ongoing order count</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <label>Here: nearby event.</label>
        </div>
    </div>
</div>
@endsection