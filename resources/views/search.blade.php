@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>All users</h1>
        <div class="panel-body">

            @if (count($users) === 0)
                Er zijn geen gebruikers gevonden
            @elseif (count($users) >= 1)
                @foreach($users as $user)
                    <h3>{{$user->name}} </h3>
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
            @endif
        </div>
    </div>
@endsection
