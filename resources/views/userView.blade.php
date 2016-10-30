{{--Page that shows every current active user. Only for the person with email adress "tomvrijmoet@hotmail.com".--}}
@extends('layouts.app')

@section('content')
    <head>

    </head>
    <div class="col-md-8 col-md-offset-2">
        @if (Session::has('status'))
            <div class="alert alert-success">{{Session::get('status')}}</div>
        @endif
        <h1>All users</h1>
        <div class="panel-body">

            {!! Form::open(array('url' => 'queries/', 'class'=>'form navbar-form navbar-left searchform')) !!}
            {!! Form::text('search', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Search for a specific user')) !!}

            <br>
            Search on:
            <br>
            Name:
            {!! Form::radio('filter', 'name', true, ['class' => 'form-control']) !!}
            <br>
            email:
            {!! Form::radio('filter', 'email', false, ['class' => 'form-control']) !!}
            <br>
            All:
            {!! Form::radio('filter', '*', false, ['class' => 'form-control']) !!}
            <br>

            {!! Form::submit('Search',
            array('class'=>'btn btn-default')) !!}
            {{ method_field('post') }}

            {!! Form::close() !!}

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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
                <br>
            @endforeach

        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).on('click', '.toggle-button', function () {
        $(this).toggleClass('toggle-button-selected');
    });
</script>
