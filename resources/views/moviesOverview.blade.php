<h1>Current available movies</h1>

@foreach($movies as $movie)
    <h2>{{ $movie->name }}</h2>
    <p>{{ $movie->description }}</p>
    <hr>
@endforeach
