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
            <p>{{ $post->titile }}{{ $post->postImage->file_name }}{{ $post->postImage->file_path }}</p>
            <br>
            {{ $post->city->name }}
        @endforeach

        
    </body>
</html>