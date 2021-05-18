<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
    {{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class='form-group'>
        {{ Form::label('keyword', 'キーワード:') }}
        {{ Form::text('keyword', null, ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        {{ Form::submit('検索', ['class' => 'btn btn-outline-primary'])}}
        <a href={{ route('admin') }}>クリア</a>
    </div>
{{ Form::close() }}

    <table border="1">
    @foreach ($posts as $post)
              <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>ステータス</th>
                        <th>変更</th>
              </tr>
              <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->titile }}</td>
                        <td>{{ $post->status_id }}</td>
                        <!-- <td><a href="/admin/edit/{{ $post->id }}">変更</a></td> -->
                        <td>  <a href="{{ route('admin.edit',$post->id)}}">変更</a> </td>


              </tr>
              @endforeach
    </table>




     


    </body>
</html>