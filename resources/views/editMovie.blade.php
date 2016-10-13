{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')

    <h1>Edit this movie</h1>
    @foreach ($results as $result)
        <table>
            {{ Form::open(array('url'=>'form-submit')) }}

            <td><img src="{{ asset($result->image) }}"/></td>
            <td>{{ Form::text('title', $result->name) }}</td>
            <td>{{ Form::textarea('title', $result->description) }}</td>
            <td>{{ Form::text('title', $result->director) }}</td>

            <td>{{ Form::submit() }}</td>

            {{ Form::close() }}
        </table>
    @endforeach


@endsection
