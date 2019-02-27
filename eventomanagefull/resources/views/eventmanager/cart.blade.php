@extends('layouts.header_m')

@section('content')

 
<!-- Custom CSS -->
  <style type="text/css">

.word-wrap{
  overflow-wrap: break-word;
}
.prod-body{
  height:300px;
}

.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.register-box{
  margin-top:20px;
}

</style>
 


<div class="box box-solid container">
<div class="box-body row">
<div class="container">
  <h2 style="text-align: center;"><b>Vendor Details</b></h2>
 
  <div class="table-responsive">          
  <table class="table" style="margin-top:20px;">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>CATEGORY</th>
        <th>EMAIL</th>
        <th>CONTACT</th>
        <th>ADDRESS</th>
        <th>Edit</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  </div>
</div>
</div>
</div>





@endsection