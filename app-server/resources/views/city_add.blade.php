<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>

    {{ Form::open(['route' => 'city.store','enctype' => 'multipart/form-data', 'method'=>'POST' ]) }} 
    <!-- <form action="{{ route('city.store')}}" method="POST"> -->
    @csrf

    <div class='form-group'>
            {{ Form::label('text', '市町村:') }}
            {{ Form::text('text', null) }}
        </div>
    <input type="submit" value="追加する">

    <!-- </form> -->

    {{ Form::close() }} 
</html>