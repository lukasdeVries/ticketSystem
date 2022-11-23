@extends('layouts.base')

@section('content')

<h1>all events</h1>
@if(session('message'))
      {{session('message')}}
      @endif
      <table class="table">
        <thead>
          <tr>
      <th scope="col">title</th>
      <th scope="col">omschrijving</th>
      <th scope="col">start datum</th>
      <th scope="col">eind datum</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($events as $event)
    <tr>
      
      <td><a href="{{route('events.show', $event->id)}}">{{$event->title}}</a></td>
      <td>{{$event->description}}</td>
      <td>{{$event->start_date}}</td>
      <td>{{$event->end_date}}</td>
      <td><a href="{{route('events.edit', $event)}}"class="btn btn-info">edit</a></td>
      <td>
        <form action="{{route('events.destroy', $event)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="x" class="btn btn-danger">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary" aria-current="page" href="{{route('events.create')}}">create</a>


@endsection
