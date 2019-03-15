@extends('layouts.header_a')

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div>
        <h4 class="text-justify text-secondary">My Profile</h4>
    </div>
</div>
@foreach ($adminprofile => $admin)
    <div>
        Name : <label for="name">{{ $admin -> name }}</label>
           
    </div>
@endforeach

@endsection