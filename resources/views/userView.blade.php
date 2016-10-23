@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>All users</h1>
        <div class="panel-body">

            {!! Form::open(array('route' => 'queries', 'class'=>'form navbar-form navbar-left searchform')) !!}
            {!! Form::text('search', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Search for a specific user')) !!}

            {!! Form::submit('Search',
            array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}
            <br>
            <br>
            @foreach($results as $user)
                <h3>{{$user->name}}</h3>
                <h4>{{$user->email}}</h4>
            @endforeach

        </div>
    </div>


@endsection
