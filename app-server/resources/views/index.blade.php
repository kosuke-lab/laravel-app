<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
    @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        <h1>テスト</h1>
        <div>session値：{{ session()->get('_token') }} </div>
            @foreach ($cities as $city)
            <p><a href="/{{ $city->id}}">{{ $city->name }}</a></p>
        @endforeach

        <img src="http://localhost:9000/image/nvaUoXmMl5p3mCUyoIG36TfGMbTAlVqua22yYbnH.png" alt="">
        <img src="http://localhost:9000/image/nvaUoXmMl5p3mCUyoIG36TfGMbTAlVqua22yYbnH.png" alt="">

    </body>
</html>