<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>カテゴリーを選択してください</h1>
        <p>{{ $_token }}</p>
        @foreach($categories as $category_id => $category_name)
            <p><a href="{{ $category_id}}/result">{{ $category_name }} </a></p>
            @endforeach
            <a href="/">戻る</a>
    </body>
</html>