@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    @if($data['vendortype'] == "caterer")
        @if($data['dinetime']==="breakfast")
            @include('vendor.packages.catererpackage')
        @endif
        @if($data['dinetime']==="lunch")
            @include('vendor.packages.catererpackage')
        @endif
        @if($data['dinetime']==="dinner")
            @include('vendor.packages.catererpackage')
        @endif
    @endif
    @if($data['vendortype'] == "makeup")
        @include('vendor.packages.makeuppackage')
    @endif
</div>
@endsection