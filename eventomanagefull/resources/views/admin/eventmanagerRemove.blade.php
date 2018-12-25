@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('alert-success'))
                <label class="text-success">{{Session::get('alert-success')}}
            @elseif(Session::has('alert-danger'))
                <label class="text-danger">{{Session::get('alert-danger')}}</label>
            @endif
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-danger">Delete?</th>
        </tr>
        </thead>
        <tbody>
            @foreach($eventmanagers as $eventmanager)
            <tr>
                <td>{{ $eventmanager->id }}</td>
                <td>{{ $eventmanager->eventmanagername }}</td>
                <td>{{ $eventmanager->eventmanageremail }}</td>
                <td>
                    <form action="{{url('admin/eventmanager-remove',['id' => $eventmanager->id])}}" method="POST">
                        <input class="btn btn-danger" type="submit" value="Delete"/>
                        <input type="hidden" name="_method" value="Delete"/>
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    {{ $eventmanagers->links() }}
</div>
@endsection