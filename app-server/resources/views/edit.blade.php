@extends('layouts.base')

@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container main">

<h1>お店編集</h1>
    @if ($errors->any())
        <div class="error">
            <ul class="error-space"> 
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

          {{ Form::model($post, ['route' =>[ 'post.update',$post->id],  'method'=>'POST', 'enctype' => 'multipart/form-data']) }} 
         @csrf

        <div class='form-group'>
            {{ Form::label('title', '場所:') }}
            {{ Form::text('title', null,['class' => 'form-control']) }}
            <span id="helpBlock" class="help-block">255文字以内で入力ください。</span>
        </div>

        <div class='form-group'>
            {{ Form::label('category_id', 'カテゴリー:') }}
            {{ Form::select('category_id', $categories,  null, ['class' => 'form-control']) }}
        </div>

        <div class='form-group'>
            {{ Form::label('city_id', '市町村:') }}
            {{ Form::select('city_id', $cities , null , ['class' => 'form-control']) }}
        </div>

        <div class='form-group'>
            {{ Form::label('address', '住所:') }}
            {{ Form::text('address', null,['class' => 'form-control']) }}
            <span id="helpBlock" class="help-block">255文字以内で入力ください。</span>
        </div>

        <div class='form-group'> 
        {{ Form::label('image', 'サムネイル:') }}
        <input type="file" name="image" class="form-control" value="{{ old('image', 'image') }}">
        <span id="helpBlock" class="help-block">再度、投稿時のサムネイルをアップロードしてください。</span>
        </div> 

        <div class="width-btn">
        <div class="text-center">
        {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}
        </div>
        </div>

    {{ Form::close() }} 
</div>

    @endsection