<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 24px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

{{--<div class="flex-center position-ref full-height">--}}
    {{--<div class="top-right links">--}}
        {{--@if (Route::has('login'))--}}
            {{--<a href="{{ url('/login') }}">Login</a>--}}
            {{--<a href="{{ url('/register') }}">Register</a>--}}
        {{--@endif--}}
    {{--</div>--}}

    <div class="content">
        @foreach($movies as $movie)
            <h2>{{ $movie->name }}</h2>
            <p>{{ $movie->description }}</p>

            <a href="{{ URL::to('movies/' . $movie->id) }}" class="btn btn-mini btn-primary"><img src="{{ asset($movie->image) }}" /></a>
            <hr>
        @endforeach
    </div>
</div>
