@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <label><strong>Add Service</strong></label>
        </div>
    </div>
    @if($vendortype === "caterer")
        @include('vendor.services.catererservice')
    @endif
    @if($vendortype === "land")
        @include('vendor.services.landservice')
    @endif
    @if($vendortype==="makeup")
        @include('vendor.services.makeupservice')
    @endif
    @if($vendortype==="transport")
        @include('vendor.services.transportservice')
    @endif
    @if($vendortype==="decorator")
        @include('vendor.services.decoratorservice')
    @endif
    @if($vendortype==="photographer")
        @include('vendor.services.photographerservice')
    @endif
    @if($vendortype==="sound")
        @include('vendor.services.soundservice')
    @endif
</div>
@endsection