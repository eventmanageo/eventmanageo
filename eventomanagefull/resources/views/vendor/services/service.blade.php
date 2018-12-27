@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <label><strong>Add Service</strong></label>
        </div>
    </div>
    @if($vendortype == "caterer")
        @include('vendor.services.catererservice')
    @endif
</div>
@endsection