{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')

    <h1>Edit my account</h1>
    @foreach ($results as $result)
        <table>

            {{ Form::open(['url' => 'updateUser/'.$result->id])}}

            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $result->name, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::textarea('email', $result->email, ['class' => 'form-control']) }}
            </div>
            <br>
            <div class="form-group">
                {{ Form::submit('Update my account', ['class' => 'btn btn-primary form-control']) }}
            </div>

            {{ Form::close()}}

        </table>
    @endforeach


@endsection
