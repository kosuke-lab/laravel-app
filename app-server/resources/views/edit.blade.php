@extends('layouts.base')


@section('content')

<div class="container">

         <h1>お店編集</h1>
         <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
          {{ Form::model($post, ['route' =>[ 'post.update',$post->id],  'method'=>'POST', 'enctype' => 'multipart/form-data']) }} 

         <!-- <form action="{{ route('post.store')}} "enctype="multipart/form-data" method="POST"> -->
         @csrf
        <div class='form-group'>
            {{ Form::label('titile', '店名:') }}
            {{ Form::text('titile', null,['class' => 'form-control']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリー:') }}
            {{ Form::select('category_id', $categories,'ordinarily', ['class' => 'form-control']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('city_id', '市町村:') }}
            {{ Form::select('city_id', $cities,'ordinarily', ['class' => 'form-control']) }}
        </div>

        <div class='form-group'>
            {{ Form::label('address', '住所:') }}
            {{ Form::text('address', null,['class' => 'form-control']) }}
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
    @endsection