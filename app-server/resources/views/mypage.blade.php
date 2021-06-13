@extends('layouts.base')


@section('content')
              <h1>投稿一覧</h1>

              <p>{{ $user_id }}</p>

     @foreach ($posts as $post)
    <p>{{ $post->titile }}</p>
    <a href="{{ route('post.edit',$post->id)}}">編集</a>
    <hr>
@endforeach

            <a href="/">戻る</a>

            @endsection