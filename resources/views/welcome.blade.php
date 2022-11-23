@extends('layouts.base')

@section('content')
<h1> hello homepage </h1>

@auth
  <p>U bent ingelogd </p>
@endauth
@endsection

