<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>テスト</h1>
            @foreach ($cities as $city)
            <p>
                  
                <a href="/{{ $city->id}}">{{ $city->name }}</a>
            </p>
        @endforeach
    </body>
</html>