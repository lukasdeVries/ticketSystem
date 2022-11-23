@extends('layouts.base')

@section('content')
@if(session('message'))
<div class="alert alert-danger">
    {{session('message')}}
</div>
@endif
<h1>order tickets for: {{$event->title}}</h1>
<form method="post" action="{{route('events.storeOrder', $event)}}">
    @csrf
    <div class="form-group">
        <label for="amount">Aantal</label>
        <input type="text" name="amount" id="amount-tickets" class="form-control">
    </div>
    <div class="form-group">
        <label for="type">selecteer betaal wijze</label>
        <select class="form-control" name="payment_method" id="">
            <option value=""></option>
            <option value="Credit Card">Credit Card</option>
            <option value="Ideal">Ideal</option>
            <option value="Sofort Banking">Sofort Banking</option>
            <option value="PayPal">PayPal</option>
        </select>
</div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" required>
    </div>
    <p><b>totaalprijs: <span id="total-price"></span></b></p>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" class="form-control">
    </div>


</form>
<script>
    let amountTicketsEl = document.getElementById('amount-tickets');
    let totalPriceEl = document.getElementById('total-price');

    amountTicketsEl.addEventListener('change', () => {
        totalPriceEl.innerHTML = amountTicketsEl.value * {{$event->price_per_ticket}}
    })
</script>
@endsection