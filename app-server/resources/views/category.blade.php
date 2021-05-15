<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <div><p>{{ $city_name }}</p></div>
        <h1>カテゴリーを選択してください</h1>
        <p>{{ $id }}</p>
        @foreach($categories as $category_id => $category_name)
            <p><a href="{{ route('post.list',['city_id'=>$id,'category_id'=>$category_id]) }}">{{ $category_name }} </a></p>
            @endforeach
            <a href="/">戻る</a>
    </body>
</html>