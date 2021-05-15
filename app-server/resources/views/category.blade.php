<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>カテゴリーを選択してください</h1>
        <p>{{ $id }}</p>
        <input type="hidden" value="{{ $id }}">
        @foreach($categories as $category_id => $category_name)
            <p><a href="{{ route('post.list',[$id,$category_id]) }}">{{ $category_name }} </a></p>
            @endforeach
            <a href="/">戻る</a>
    </body>
</html>