@extends('layouts.base')
@section('title', 'mypage')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/mypage.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">


              <h1>投稿一覧</h1>

              <p>{{ $user_id }}</p>


     @foreach ($posts as $post)
     <div class="linkpanel">
    <p>{{ $post->titile }}</p>
    <p>{{ $post->address }}</p>
    <div class="panel-button">
    <a href="{{ route('post.edit',$post->id)}}" class="btn btn-outline-primary">編集</a>
    </div>
    </div>
@endforeach

            <a href="/">戻る</a>
            </div>

            @endsection