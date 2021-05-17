<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>テスト</h1>



     <p> {{$results->titile}} {{$results->file_path}}</p>
     <img src="http://localhost:9000/{{$results->postImage->file_path }}" alt="{{$results->postImage->file_name }}">
    
     


    </body>
</html>