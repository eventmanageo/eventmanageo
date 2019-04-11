@extends('layouts.header_a')

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div>
        <h4 class="text-justify text-secondary">My Profile</h4>
    </div><br><br>

@foreach($admindata as $data)
    <div>
        Name : <label for="name">{{ $data -> name }}</label><br><br>
        Email : <label for="email">{{ $data -> email }}</label>
    </div>
@endforeach
</div>

@endsection