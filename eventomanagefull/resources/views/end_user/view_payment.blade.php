@extends('layouts.header_u')

@section('content')


<div class="container">

    <div>
    <h1>eOm</h1>


    </div>
    <h3 id="payment_event">Event Payment</h3>
    <div class="row border-bottom">
        <div class="col-sm-3">
            <label id="eventname" for="Eventname">Event Name :</label>
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label id="eventname" for="Eventname">#</label>
        </div>
    </div><br><br>

    <!-- name of the Customer -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Name :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">#</label>
        </div>
    </div>

    <!-- name of the phone Number -->
    <div class="row">
        <div class="col-sm-2">
            <label for="phone">Phone Number :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="phone">#</label>
        </div>
    </div>

    <!-- name of the Customer -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Email :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">#</label>
        </div>
    </div>

    <!-- name of the Customer check in Checkout date -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Checkin & Checkout :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">#</label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label for="name">Number Of people :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">#</label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Address :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">#</label>
        </div>
    </div>

    <!-- services -->
    <div>
        <h3 id="payment-services">Services</h3>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Services</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            </tr>

        <!-- total of amount -->
            <tr >
            <td colspan="3" style="text-align:right">total : </td>
            <td style="text-align:left">#</td>
            </tr>

        </tbody>
        </table>
    </div>

    <!-- print the page -->
    <div>
    <button class="btn btn-primary float-right btn-sm" id="print-btn" onclick="myFunction()">Print</button>
    </div>
    <script>
        function myFunction() {
        window.print();
        }
    </script>






</div>
@endsection