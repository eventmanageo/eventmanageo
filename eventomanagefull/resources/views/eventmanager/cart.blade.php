@extends('layouts.header_m')

@section('content')

 
<!-- Custom CSS -->
  <style type="text/css">



.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


</style>
 


<div class="box box-solid container">
<div class="box-body row">
<div class="container"><br>
  <h2 style="text-align: center;"><b>User Cart Details</b></h2>
 
  <div class="table-responsive">          
  <table class="table" style="margin-top:20px;">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>SERVICE NAME</th>
        <th>DESCRIPTION</th>
        <th>PRICE</th>
        <th>Edit</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $value)
            <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->service_name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->price }}</td>
            <td><a href = 'edits/{{ $value->id }}'>Edit</a></a></td>
            <td><a href = 'deletes/{{ $value->id }}'><button class="btn btn-danger  btn-sm">Delete</button></a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
</div>





@endsection