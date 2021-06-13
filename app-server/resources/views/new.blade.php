@extends('layouts.base')


@section('content')

<div class="container">

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
            {{ Form::text('titile', null,['class' => 'form-control','placeholder' => '例)：明治神宮']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリー:') }}
            {{ Form::select('category_id', $categories,'ordinarily', ['class' => 'form-control']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('city_id', '市町村:') }}
            {{ Form::select ('city_id', $cities, 'ordinarily', ['class' => 'form-control']) }}
        </div>

        <div class='form-group'>
            {{ Form::label('address', '住所:') }}
            {{ Form::text('address', null,['class' => 'form-control','placeholder'=>'例)：東京都渋谷区代々木神園町１−１']) }}
        </div>

        <div class='form-group'> 
        {{ Form::label('image', 'サムネイル:') }}
        <input type="file" name="image" class="form-control">
        </div> 


        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>
        
    {{ Form::close() }} 

    </div>



    <script type="text/javascript">
            // {{--失敗時--}}
            @if (session('msg_danger'))
                $(function () {
                    toastr.success('{{ session('msg_danger') }}');
                });
            @endif
</script>
    @endsection