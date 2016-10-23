{{--For admins only, shows a page with all movies with an extra edit button, linked to a page for editing details.--}}
@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
            <h1>All the movies</h1>
            <a href="{{ url('/create') }}" class="btn btn-mini btn-primary"><h3>Add a new movie</h3></a>
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
