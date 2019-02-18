
@extends('layouts.app')

@section('content')
    <h1>Popis jela</h1>

    <table class="table">
        <thead class="thead thead-light">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                <tr>
                    <td><a href="{{route('meals.show',$meal->id)}}">{{$meal->title}}</a></td>
                    <td>{{$meal->status}}</td>
                    <td>{{$meal->category->title}}</td>
                    <td>{{$meal->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$meals->links()}}
@endsection