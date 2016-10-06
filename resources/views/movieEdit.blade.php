@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
            <h1>All the movies</h1>
            @foreach($movies as $movie)
                <h2>{{ $movie->name }}</h2>
                {{--<p>{{ $movie->description }}</p>--}}
                <a href="{{ URL::to('movieDetails/' . $movie->id) }}" class="btn btn-mini btn-primary"><img src="{{ asset($movie->image) }}"/></a>
                <a class="btn btn-small btn-info" href="{{ URL::to('movieDetails/' . $movie->id . '/edit') }}">Edit this movie</a>

                <hr>
            @endforeach
        </div>
    </div>
@endsection
