@extends('layouts.base')
@section('title', $results->title)
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/detail.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container main">
    <div class="row">
            <div class="col-md-6 position">
            <img src="https://shuffle.tokyo/{{$results->postImage->file_path }}" alt="{{$results->postImage->file_name }}">
            </div>
            <div class="col-md-6">
            <h2>{{$results->title}}</h2>
            <p>{{$results->address }}</p>
            <p class="list">※イメージ画像がない場合はnoimageの画像が入ることがあります。</p>
                <div class="row detail">
                            <div class="col-md-6">
                                <button class="btn btn-primary detail-btn"  id="reload" onclick="window.location.reload();">同じ条件で検索する</button>
                            </div>
                @if (Route::has('login'))
                    @auth
                    <div class="col-md-6" id="app">
                                <like-component :post-id="{{ json_encode($results->id) }}":user-id="{{ json_encode($userAuth) }}":default-liked="{{ json_encode($defaultLiked) }}":default-Count="{{ json_encode($defaultCount) }}"></like-component>
                            </div>
                    @else
                    @endauth
                @endif
                    </div>
            </div>
    </div>
        <div class="mb-3">
            <iframe id='map'src='https://www.google.com/maps/embed/v1/place?key={{ config("app.google_api")}}&amp;q={{ $results->address }}' width='100%' height='150' frameborder='0'></iframe>
            </div>
            <div class="width-btn">
        <div class="text-center">
        <a href="/" class="btn btn-primary detail-btn">戻る</a>
        </div>
        </div>
       
    </div>


        <script src="{{asset('js/app.js')}}"></script>

@endsection