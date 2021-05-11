<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>カテゴリーを選択してください</h1>
        @foreach($categories as $key => $category)
            <p>
                    {{ $category }}
            </p>
            @endforeach
    </body>
</html>