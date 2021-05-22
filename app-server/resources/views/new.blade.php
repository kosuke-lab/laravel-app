<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>新規投稿フォーム</title>
        <style>body {padding: 10px;}</style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body>
         <h1>新しいお店</h1>
         <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
          {{ Form::open(['route' => 'post.store','enctype' => 'multipart/form-data', 'method'=>'POST' ]) }} 
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
        <input type="file" name="image">
        </div> 


        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>

    {{ Form::close() }} 

    <script type="text/javascript">
            // {{--失敗時--}}
            @if (session('msg_danger'))
                $(function () {
                    toastr.success('{{ session('msg_danger') }}');
                });
            @endif
</script>
    </body>
</html>