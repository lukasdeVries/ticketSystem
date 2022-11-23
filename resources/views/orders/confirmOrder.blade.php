@extends('layouts.base')

@section('content')
    <h2>Bedankt voor uw bestelling!!</h2>
    <h3> Hier zijn uw bestelgegevens: </h3>

    <div class="order">
        <p>ordernummer: {{ $order->id }}</p>
        <p>Betaald met: {{$order->payment_method}}</p>

        <h3> Overzicht van bestelde tickets </h3>
        <ul class="list-group">
            @foreach($order->tickets as $ticket)
                <li class="list-group-item @if($ticket->scanned_at) list-group-item-danger @endif">
                    {{ $ticket->id }} evenement: {{ $ticket->event->title }}
                    <div class="code">
                        <p>QR Code:</p>
                        <a href="{{route('tickets.scan', $ticket->id)}}">
                            <img src="{{ (new chillerlan\QRCode\QRCode)->render( route('tickets.scan', $ticket->id)) }}" alt="">
                        </a>
                        {{-- hier de qr code op basis van ticket id --}}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Order data | Event data behorend bij order | tickets nodig behorend bij de order --}}
@endsection
