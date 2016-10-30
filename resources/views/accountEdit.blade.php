{{--Only for admins, shows a form with all current information, used to edit the details of this movie.--}}
@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <h1>Edit my account</h1>
        <div class="panel-body">    @foreach ($results as $result)
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

                    <div class="form-group">
                        {{ Form::label('image', 'Image:') }}
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>

                    <br>
                    <div class="form-group">
                        {{ Form::submit('Update my account', ['class' => 'submitButton']) }}
                    </div>

                    {{ Form::close()}}

                </table>
            @endforeach
        </div>
    </div>

@endsection
