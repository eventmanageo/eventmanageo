@extends('layouts.header_m')

@section('content')
    <div class="container-fluid">
        @if($eventPastDetails->isEmpty())
            <label>You have not completed any event yet.</label>
        @else
            <table class="table">
                <tr>
                    <th>Event Name</th>
                    <th>Event Type</th>
                    <th></th>
                </tr>
                @foreach($eventPastDetails as $item)
                    <tr>
                        <td>{{$item->event_name}}</td>
                        <td>
                            @if($item->event_type === "marriagegroom")
                                <label>Marriage of Groom</label>
                                @elseif ($item->event_type === "marriagebride")
                                <label>Marriage of Bride</label>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="/eventmanager/view/event/{{$item->id}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection