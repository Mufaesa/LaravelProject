{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')

    <h1>Add a movie</h1>

    </hr>

    {{--{{ Form::open(array('action' => 'movieOverviewController@store'))}}--}}
    {{ Form::open(['url' => 'movies'])}}

    <div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('director', 'Director:') }}
        {{ Form::text('director', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Add movie', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close()}}

@endsection
