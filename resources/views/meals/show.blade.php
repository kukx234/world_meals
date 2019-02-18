@extends('layouts.app')

@section('content')

   @if (isset($details))
       <p>The search results for your query  are:</p>
       <h1>meals</h1>

       @foreach ($details as $meal)
        <h3>{{$meal->id}}</h3>
           <h3>{{$meal->title}}</h3>
           <h3>{{$meal->description}}</h3>
       @endforeach
   @endif

@endsection