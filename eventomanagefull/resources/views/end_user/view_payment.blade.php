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
    <?php $total = 0; ?>

    @if($payment_caterer -> isNotEmpty())  
    <div>
        <h4 id="payment-services">Caterer packages</h4>
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
        <?php $total += $data->package_price; ?>
        <tbody>
            <tr>
            <td scope="col"></td>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> no_of_people }}</td>
            <td>{{ $caterer = $data -> package_price }}</td>
            </tr>
        @endforeach
        </tbody>
        
        </table>
    </div>
    @endif
    <!-- user makups -->

    @if($makups -> isNotEmpty())
    <div>
        <h4 id="payment-services">makups packages</h4>
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
        <?php $total += $data->package_price; ?>
        <tbody>
            <tr>
            <td scope="row"></td>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> no_of_people }}</td>
            <td>{{ $makup = $data -> package_price }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endif
    
    <!-- photographer services -->

    @if($photographer -> isNotEmpty())
    <div>
        <h4 id="payment-services">photographers packages</h4>
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
        @foreach ($photographer as $data)
        <?php $total += $data->package_price; ?>
        <tbody>
            <tr>
            <td scope="row"></td>
            <td>{{ $data -> package_name }}</td>
            <td>{{ $data -> package_description }}</td>
            <td>{{ $photo = $data -> package_price }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endif
    <!-- decorator services -->

    @if($decorator -> isNotEmpty())
    <div>
        <h4 id="payment-services">decorator services</h4>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">items name</th>
            <th scope="col">items decription</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($decorator as $data)
        <?php $total += $data->item_price; ?>
        <tbody>
            <tr>
            <td scope="row"></td>
            <td>{{ $data -> item_name }}</td>
            <td>{{ $data -> item_description }}</td>
            <td>{{ $deco = $data -> item_price }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endif

        <!-- land services -->
    @if($land -> isNotEmpty())
    <div>
        <h4 id="payment-services">Land services</h4>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Land name</th>
            <th scope="col">Land decription</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($land as $data)
        <?php $total += $data->land_price; ?>
        <tbody>
            <tr>
            <td scope="row"></td>
            <td>{{ $data -> land_name }}</td>
            <td>{{ $data -> land_description }}</td>
            <td>{{ $land = $data -> land_price }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endif
        
        
            <!-- sound services -->
     @if($sound->isNotEmpty())       
    <div>
        <h4 id="payment-services">sound services</h4>
    </div>


    <div>
            <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">service name</th>
            <th scope="col">service decription</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        @foreach ($sound as $data)
        <?php $total += $data->service_price; ?>
        <tbody>
            <tr>
            <td scope="row"></td    >
            <td>{{ $data -> service_name }}</td>
            <td>{{ $data -> service_description }}</td>
            <td>{{ $sound = $data -> service_price }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    @endif
    <!-- total of all values  -->
    <div style="float:right">
        <label for="total">Total : {{ $total }} </label>
        
    </div>


    <!-- print the page -->
    <div style="padding-top:3%">
    <button class="btn btn-primary" onclick="#">make payment</button>
     </div>
    






</div>
@endsection