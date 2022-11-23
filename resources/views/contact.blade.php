@extends('layouts.base')

@section('content')


<body>
    <h1>contact</h1>
    <p>mijn leeftijd: {{$me['leeftijd']}}</p>
    <ul>
        @foreach($names as $name)
            <li>{{$name}}</li>
        @endforeach
            
        
    </ul>
    <h2>vakken</h2>
    <ul>
        @foreach ($grades as $key => $val)
            <li>{{$key}}: {{$val}}</li>
        @endforeach
    </ul>
@endsection
