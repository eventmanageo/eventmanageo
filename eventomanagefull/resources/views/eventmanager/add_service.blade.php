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
    
        <h2 style="text-align: center;"><b>Add service </b></h2><br>
        <div class="">
        <button class="btn btn-primary  btn-sm ml-auto">Add Services</button>
        </div> <br>
                    <label for=""><b>Client Name :  </b>Parth Chudasama</label><br><br>
                    <label for=""><b>Event Name :  </b>Merrige </label><br><br>
                    <label for=""><b>Date :  </b>15/03/2019</label>
         </div>
    </div>       
</div>



@endsection



