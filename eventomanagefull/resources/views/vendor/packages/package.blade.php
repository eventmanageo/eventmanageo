@extends('layouts.header_v')

@section('content')
<div class="container-fluid">
    @if($data['vendortype'] == "caterer")
        @include('vendor.packages.catererpackage')
    @endif
    @if($data['vendortype'] == "makeup")
        @include('vendor.packages.makeuppackage')
    @endif
    @if($data['vendortype'] == "photographer")
        @include('vendor.packages.photographerpackage')
    @endif
</div>
@endsection