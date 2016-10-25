{{--Only for admins, shows a form that allows admins to add new movies to the database.--}}
@extends('layouts.app')

@section('content')

    <h1>Add a movie</h1>

    </hr>

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
        {{ Form::label('image', 'Image:') }}
        {{ Form::file('image', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Add movie', ['class' => 'btn btn-primary form-control']) }}
    </div>

    {{ Form::close()}}

@endsection
