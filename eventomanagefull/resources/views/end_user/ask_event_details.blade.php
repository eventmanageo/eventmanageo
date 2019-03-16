@extends('layouts.header_u')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            @if(isset($event_type) == "marriage")
                <label class="h4 text-muted">Marraige</label>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col border mb-2">
            <div class="mt-4 mb-4 eventdetailsform">
                <form action="/insert-into-event-basic-details" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="event_type" value="{{$event_type}}"/>
                    <div id="step1">
                        <label>Event name</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" required placeholder="Event Name"/>
                        <br/>
                        <label>Event city</label>
                        <input type="text" class="form-control" id="event_location" name="event_location" required placeholder="Enter City"/>
                        <br/>
                        <div class="row">
                            <div class="col-sm-2">Select</div>
                            <div class="col-sm-9">
                                <label class="radio-inline"><input type="radio" name="whose_marriage" value="groom" checked>Groom</label>
                                <label class="radio-inline"><input type="radio" name="whose_marriage" value="bride">Bride</label>
                            </div>
                        </div>
                        <br/>
                        <label>Check-in</label>
                        <input class="form-control" type="date" id="checkin-date" name="check_in">
                        <br/>
                        <label>Check-out</label>
                        <input class="form-control" type="date" id="checkout-date" name="check_out">
                        <br/>
                        <div class="row">
                            <div class="col">Expected no of people</div>
                        </div>
                        <div>
                            <input type="number" id="no-guest" name="no_guest" min="100" class="form-control" placeholder="Expected no of people"/>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-6 text-right">
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit"/>
                            </div>
                            <div class="col-6 text-left">
                                <input type="reset" class="btn btn-secondary" id="reset" name="reset" value="Reset"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
@endsection