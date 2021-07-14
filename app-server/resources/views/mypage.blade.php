@extends('layouts.base')
@section('title', 'マイページ')
@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/mypage.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container main">
              <h1>投稿一覧</h1>
              <p>{{ $user_id }}</p>

<div class="wrapper">
    <div class="tabs">
    <div>
        <input id="posts" type="radio" name="tab_item" checked>
        <label class="tab_item tab_item01" for="posts"><i class="fas fa-rss"></i>投稿一覧</label>
        <input id="favorites" type="radio" name="tab_item">
        <label class="tab_item tab_item02" for="favorites"><i class="fas fa-rss"></i>お気に入り</label>
        
            <div class="tab_content" id="posts_content">
                @foreach ($posts as $post)
                    <div class="linkpanel">
                        <p>{{ $post->title }}</p>
                        <p>{{ $post->address }}</p>
                            <div class="status">
                            <p class="status-color">{{ $statuses[$post->status_id] }}</p>
                            </div>
                                <div class="panel-button">
                                    <a href="{{ route('post.edit',$post->id)}}" class="btn btn-outline-primary">編集</a>
                                </div>
                    </div>
                @endforeach
            </div>

        <div class="tab_content" id="favorites_content">
            @foreach ($favorites as $favorite)
                <div class="linkpanel">
                    <p>{{ $favorite->title }}</p>
                    <p>{{ $favorite->address }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
 <a href="/">戻る</a>
</div>

</div>

            @endsection