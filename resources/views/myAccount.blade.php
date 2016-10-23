@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>My account</h1>
        <h3><?=$user->name;?></h3>
        <br>
        <h3><?=$user->email;?></h3>

        <a class="btn btn-small btn-info" href="{{ URL::to('accountEdit/'. $user->id) }}">Edit my account</a>
    </div>
@endsection
