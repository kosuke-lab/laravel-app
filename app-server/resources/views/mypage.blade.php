<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
              <h1>投稿一覧</h1>

              <p>{{ $user_id }}</p>

     @foreach ($posts as $post)
    <p>{{ $post->titile }}</p>
    <a href="{{ route('post.edit',$post->id)}}">編集</a>
    <hr>
@endforeach

            <a href="/">戻る</a>
    </body>
</html>