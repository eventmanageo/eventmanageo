@extends('layouts.header_u')

@section('content')


<div class="container">

    <div>
    <h1>eOm</h1>


    </div>
    @foreach ($viewPayment as $data)
    <h3 id="payment_event">Event Payment</h3>
    <div class="row border-bottom">
        <div class="col-sm-3">
            <label id="eventname" for="Eventname">Event Name : </label>
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label id="eventname" for="Eventname">{{ $data -> event_name }}</label>
        </div>
    </div><br><br>

    <!-- name of the Customer -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Name :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">{{ $data -> name }}</label>
        </div>
    </div>

    <!-- name of the phone Number -->
    <div class="row">
        <div class="col-sm-2">
            <label for="phone">Phone Number :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="phone">{{ $data -> contact }}</label>
        </div>
    </div>

    <!-- name of the Customer -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Email :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">{{ $data -> email }}</label>
        </div>
    </div>

    <!-- name of the Customer check in Checkout date -->
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Checkin & Checkout :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="checkin ">{{ $data -> event_date_from }}</label> &nbsp  to &nbsp <label for="checkout">{{ $data -> event_date_to }}</label>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2">
            <label for="name">Customer Address :</label> 
        </div>  
        <div class="col-sm-8">
        <!-- retrive from data base -->
            <label for="name">{{ $data -> address }}</label>
        </div>
    </div>

    @endforeach
    <!-- services -->
    <div>
        <h3 id="payment-services">Caterer packages</h3>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">packages name</th>
            <th scope="col">number of people</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($payment_caterer as $data)
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> no_of_people }}</td>
            <td>{{ $data -> package_price }}</td>
            </tr>
        @endforeach
        <!-- total of amount -->
            <tr >
            <td colspan="3" style="text-align:right">total : </td>
            <td style="text-align:left">#</td>
            </tr>

        </tbody>
        </table>
    </div>

    <!-- user makups -->

    <div>
        <h3 id="payment-services">makups packages</h3>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">packages name</th>
            <th scope="col">number of people</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($makups as $data)
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> no_of_people }}</td>
            <td>{{ $data -> package_price }}</td>
            </tr>
        @endforeach
        <!-- total of amount -->
            <tr >
            <td colspan="3" style="text-align:right">total : </td>
            <td style="text-align:left">#</td>
            </tr>

        </tbody>
        </table>
    </div>


    <!-- photographer services -->
    <div>
        <h3 id="payment-services">photographers packages</h3>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">packages name</th>
            <th scope="col">number of people</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($makups as $data)
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> package_description }}</td>
            <td>{{ $data -> package_price }}</td>
            </tr>
        @endforeach
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