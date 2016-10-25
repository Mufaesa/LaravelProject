@extends('layouts.app')

@section('content')
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $(document).on('click', '.toggle-button', function () {
                $(this).toggleClass('toggle-button-selected');
            });
        </script>
    </head>
    <div class="col-md-8 col-md-offset-2">
        <h1>All users</h1>
        <div class="panel-body">

            {!! Form::open(array('url' => 'queries/', 'class'=>'form navbar-form navbar-left searchform')) !!}
            {!! Form::text('search', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Search for a specific user')) !!}

            {!! Form::submit('Search',
            array('class'=>'btn btn-default')) !!}
            {{ method_field('post') }}
            {!! Form::close() !!}
            <br>
            <br>
            @foreach($results as $user)

                <h3>{{$user->name}}</h3>
                <h4>{{$user->email}}</h4>

                @if($user->role === 2)
                    <form action="toggleUser/{{$user->id}}" method="post">
                        <div class="toggle-button toggle-button-selected">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="toggle-button-selected"></button>
                        </div>
                    </form>
                @else
                    <form action="toggleUser/{{$user->id}}" method="post">
                        <div class="toggle-button">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button></button>
                        </div>
                    </form>
                @endif

            @endforeach

        </div>
    </div>

@endsection
