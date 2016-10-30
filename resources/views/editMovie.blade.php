{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit this movie</h1>
        <div class="panel-body">

            @foreach ($results as $result)
                <table>

                    {{ Form::open(['url' => 'update/'.$result->id])}}

                    <div class="moviePoster">
                        <img src="{{ asset($result->image) }}"/>
                    </div>

                    <div class="form-group">
                        {{ Form::label('title', 'Title:') }}
                        {{ Form::text('title', $result->name, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description:') }}
                        {{ Form::textarea('description', $result->description, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('director', 'Director:') }}
                        {{ Form::text('director', $result->director, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('image', 'Image:') }}
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Update movie', ['class' => 'submitButton']) }}
                    </div>

                    {{ Form::close()}}


                    {{ Form::close()}}
                </table>
            @endforeach
        </div>
    </div>

@endsection
