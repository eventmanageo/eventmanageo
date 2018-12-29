@extends('layouts.header_v')

@section('content')
<div class="container-fluid">
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