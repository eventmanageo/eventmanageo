@extends('layouts.header_m')

@section('content')

 



<div class="container">
  <h2 style="text-align: center;"><b>Vendor Details</b></h2>
 
  <div class="table-responsive">          
  <table class="table" style="margin-top:40px;">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>CATEGORY</th>
        <th>EMAIL</th>
        <th>CONTACT</th>
        <th>ADDRESS</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $value)
            <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->category }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->contact }}</td>
            <td>{{ $value->address }}</td>
            <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>


@endsection