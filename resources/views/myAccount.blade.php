{{--Page for every individual user. Shows their personal info + an edit button.--}}
@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if (Session::has('status'))
            <div class="alert alert-success">{{Session::get('status')}}</div>
        @endif
        <h1>My account</h1>
        <img src="{{ $user->image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h5>Name:</h5>
        <h3>{{$user->name}}</h3>
        <br>
        <h5>Email:</h5>
        <h3>{{$user->email}}</h3>

        <a class="btn btn-small btn-info" href="{{ URL::to('accountEdit/'. $user->id) }}">Edit my account</a>
    </div>
@endsection
