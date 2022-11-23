@extends('layouts.base')

@section('content')
<h1>{{$event->title}}</h1>
<ul class="list-group">
    <li class="list-group-item">Start date: <b>{{$event->start_date }}</b></li>
    <li class="list-group-item">End date: <b>{{$event->end_date }}</b></li>
</ul>

<h3>ONLY {{$event->amount_tickets - $event->tickets()->count()  }} TICKETS LEFT!!!</h3>
<p>Ticket Price: {{$event->price_per_ticket }}</p>
<p>Get your tickets now!!</p>
<a href="{{route('events.order', $event)}}" class="btn btn-success">BUY TICKETS!</a>


<!--  - $event->tickets()->count() -->
@endsection