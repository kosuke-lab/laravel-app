<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>新規投稿フォーム</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
         <h1>お店編集</h1>
         <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
          {{ Form::model($post, ['route' =>[ 'admin.update',$post->id],  'method'=>'POST', 'enctype' => 'multipart/form-data']) }} 

         <!-- <form action="{{ route('post.store')}} "enctype="multipart/form-data" method="POST"> -->
         @csrf
        <div class='form-group'>
            {{ Form::label('titile', '店名:') }}
            {{ Form::text('titile', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリー:') }}
            {{ Form::select('category_id', $categories) }}
        </div>
        <div class='form-group'>
            {{ Form::label('city_id', '市町村:') }}
            {{ Form::select('city_id', $cities) }}
        </div>

        <div class='form-group'>
            {{ Form::label('address', '住所:') }}
            {{ Form::text('address', null) }}
        </div>

        <div class='form-group'>
            {{ Form::label('status_id', 'ステータス:') }}
            {{ Form::select('status_id', $statuses, $statuses[$post->status_id])}}
        </div>

        <div class='form-group'> 
        <input type="file" name="image">
        </div> 


        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>

    {{ Form::close() }} 

    </body>
</html>