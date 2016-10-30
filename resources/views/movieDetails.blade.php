{{--Page for every user, shows details of a specific movie--}}
@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <h1>About this movie</h1>
        <div class="panel-body">
            @foreach ($results as $result)
                <div class="moviePoster">
                    <img src="{{ asset($result->image) }}" height="500px" width="325px"/>
                </div>
                <h3>Name:</h3>
                <h2>{{$result->name}}</h2>
                <br>
                <h3>Description:</h3>
                <h4>{{$result->description}}</h4>
                <br>
                <h3>Director:</h3>
                <h4>{{$result->director}}</h4>


            @endforeach
        </div>
    </div>

@endsection
