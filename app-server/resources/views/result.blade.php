<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>テスト</h1>

            @foreach ($posts as $post)
            <p>{{ $post->titile }}</p>
            <img src="http://localhost:9000/{{$post->postImage->file_path }}" alt="{{$post->postimage->file_name}}">
            <br>
            {{ $post->city->name }}
        @endforeach
    

        
    </body>
</html>