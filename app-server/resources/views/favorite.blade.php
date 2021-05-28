<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <div><p></p></div>
        <h1>お気に入りページ</h1>
        @foreach($posts as $post)
            <p>{{ $post->titile }}</p>
            @endforeach
    </body>
</html>