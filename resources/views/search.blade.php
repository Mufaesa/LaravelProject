@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>All users</h1>
        <div class="panel-body">
            @if (count($users) === 0)
                Er zijn geen gebruikers gevonden
            @elseif (count($users) >= 1)
                @foreach($users as $user)
                    Gevonden gebruikers:
                @endforeach
            @endif
        </div>
    </div>
@endsection
