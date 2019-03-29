@extends('layouts.header_u')

@section('content')
@foreach($profile as $data)
<div class="container">
    <div class="shadow p-3">
        <div class="row">
            <div class="col-6 text-left">
                <div class="row">
                    <div class="col">Name</div>
                </div>
                <div class="row">
                    <div class="col">Email</div>
                </div>
                <div class="row">
                    <div class="col">Contact</div>
                </div>
                <div class="row">
                    <div class="col">Address</div>
                </div>
            </div>
            <div class="col-6 text-left">
                <div class="row">
                    <div class="col">{{ $data -> name }}</div>
                </div>
                <div class="row">
                    <div class="col">{{ $data -> email }}</div>
                </div>
                <div class="row">
                    <div class="col">{{ $data -> contact }}</div>
                </div>
                <div class="row">
                    <div class="col">{{ $data -> address }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection