@extends('layouts.header_m')

@section('content')
<!-- Custom CSS -->
<style type="text/css">

.box:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

</style>

<div class="box box-solid container">
    <div class="container "><br>
    
        <h2 style="text-align: center;"><b>Event details</b></h2><br>
        <div class="">
        <button class="btn btn-primary btn-sm ml-auto">Add Service</button><br><br>
        </div> 

                     <label for=""><b>Client Name :  </b>Parth Chudasama</label><br><br>
                    <label for=""><b>Event Name :  </b>Merrige </label><br><br>
                    <label for=""><b>Date :  </b>15/03/2019</label>
       
        <div class="table-responsive">   

  <table class="table" style="margin-top:20px;">
    <thead>
      <tr>
        <th>No</th>
        <th>Service</th>
        <th>Description</th>
        <th>Price</th>
       </tr>
    </thead>
    <tbody>
    <tr>
    <td>1</td>
    <td>cateres</td>
    <td>Gulab jamun</td>
    <td>15000</td>
    </tr>

    <tr>
    <td>2</td>
    <td>Photo</td>
    <td>3d camera</td>
    <td>5000</td>
    </tr>
    </tbody>
  </table>
  </div>
    </div>       
</div>









@endsection