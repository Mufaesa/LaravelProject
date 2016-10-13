{{--Page for every user, shows details of a specific movie--}}
@extends('layouts.app')

@section('content')


    <div class="col-md-8 col-md-offset-2">
        <h1>About this movie</h1>
        <div class="panel-body">
            @foreach ($results as $result)
                <table>

                    <td><img src="{{ asset($result->image) }}"/></td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->description}}</td>
                    <td>{{$result->director}}</td>

                </table>
            @endforeach
        </div>
    </div>

@endsection
