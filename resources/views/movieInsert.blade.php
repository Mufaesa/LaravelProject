@extends('layouts.app')

@section('content')

<form action="store" method="POST">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"> <br>
    <label for="description">Description</label>
    <input type="text" name="description" id="description"> <br>
    <label for="director">Director</label>
    <input type="text" name="director" id="director"> <br>
    <label for="image">Image</label>
    <input type="image" name="image" id="image"> <br>

</form>
@endsection
