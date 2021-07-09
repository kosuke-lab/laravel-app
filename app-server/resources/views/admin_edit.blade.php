@extends('layouts.base')

@section('title', '管理者編集ページ')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container main">
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
            {{ Form::label('title', '場所:') }}
            {{ Form::text('title', null,['class' => 'form-control']) }}
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
        </div>

        <div class='form-group'>
            {{ Form::label('status_id', 'ステータス:') }}
            {{ Form::select('status_id', $statuses,  $statuses[$post->status_id], ['class' => 'form-control'])}}
        </div>

        <div class='form-group'> 
        {{ Form::label('image', 'サムネイル:') }}
        <br>
        <input type="file" name="image" class="form-control">
        <span id="helpBlock" class="help-block">サムネイルがなくても投稿が可能です。</span>
        </div> 


        <div class="width-btn">
        <div class="text-center">
        {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}
        </div>
        </div>


    {{ Form::close() }} 
</div>

    @endsection