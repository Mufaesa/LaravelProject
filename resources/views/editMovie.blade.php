{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')

    <h1>Edit this movie</h1>
    @foreach ($results as $result)
        <table>

            {{ Form::open(['url' => 'update/'.$result->id])}}

            <td><img src="{{ asset($result->image) }}"/></td>

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
                {{ Form::submit('Update movie', ['class' => 'btn btn-primary form-control']) }}
            </div>

            {{ Form::close()}}

            <br>
            <br>
            <br>
            <br>

            {{ Form::open(['url' => 'delete/'.$result->id])}}

            <div class="form-group">
                {{ Form::submit('Or delete this movie', ['class' => 'btn btn-primary form-control']) }}
            </div>

            {{ Form::close()}}
        </table>
    @endforeach


@endsection
