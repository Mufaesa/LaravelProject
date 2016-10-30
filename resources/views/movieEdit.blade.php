{{--For admins only, shows a page with all movies with an extra edit button, linked to a page for editing details.--}}
@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
            @if (Session::has('status'))
                <div class="alert alert-success">{{Session::get('status')}}</div>
            @endif
            <h1>All movies</h1>

            <br>

            @foreach($movies as $movie)
                <div class="movieArea">
                    <h2>{{ $movie->name }}</h2>
                    {{--<p>{{ $movie->description }}</p>--}}
                    <a href="{{ URL::to('movieDetails/' . $movie->id) }}" class="btn btn-mini btn-primary"><img src="{{ asset($movie->image) }}" height="390px" width="265px"/></a>
                    <a class="submitButton" href="{{ URL::to('movieDetails/' . $movie->id . '/edit') }}">Edit this movie</a>
                    {{ Form::open(['url' => 'delete/'.$movie->id])}}

                    {{ Form::submit('Delete this movie', ['class' => 'submitButton']) }}

                    {{ Form::close()}}
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection
