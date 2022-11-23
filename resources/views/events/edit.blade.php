@extends('layouts.base')

@section('content')

@if ($errors)
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('events.update', $event)}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="title">title</label>
        <input value="{{$event->title}}" type="text" name="title" required>
    </div>
    <div class="form-group">
        <label for="organisation_id">organistatie</label>
        <select name="organisation_id" id="">
            @foreach($organisations as $organisation)

                <option @if($organisation->id == $event->organisation_id) selected @endif value="{{$organisation->id}}">{{$organisation->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">omschrijving</label>
        <textarea name="description"  cols="30" rows="10" class="form-control">{{$event->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="start_date">start datum</label>
        <input value="{{$event->start_date}}" type="datetime-local" name="start_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="end_date">eind datum</label>
        <input value="{{$event->end_date}}" type="datetime-local" name="end_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="ticket_amount">aantal tickets</label>
        <input value="{{$event->amount_tickets}}" type="number" name="amount_tickets" class="form-control">
    </div>
    <div class="form-group">
        <label for="price_per_ticket">ticket prijs</label>
        <input value="{{$event->price_per_ticket}}" type="text" name="price_per_ticket" class="form-control">
    </div>
    <div class="form-group">
        <label for="city">stad</label>
        <input value="{{$event->city}}" type="text" name="city" class="form-control">
    </div>
    <div class="form-group">
        <label for="adres">adres</label>
        <input value="{{$event->adres}}" type="text" name="adres" class="form-control">
    </div>
    <div class="form-group">
        <label for="zipcode">postcode</label>
        <input value="{{$event->zipcode}}" type="text" name="zipcode" class="form-control">
    </div>
    <div class="form-group">
        <label for="categorie">categorie</label>
        <input value="{{$event->categorie}}" type="text" name="categorie" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary">

</form>




@endsection

