@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>All movies</h1>
        <div class="panel-body">
            @foreach($movies as $movie)
                <div class="movieArea">
                    <h1>{{ $movie->name }}</h1>
                    {{--<p>{{ $movie->description }}</p>--}}

                    <a href="{{ URL::to('movieDetails/' . $movie->id) }}" class="btn btn-mini btn-primary"><img src="{{ $movie->image }}" height="400px" width="250px"/></a>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection
