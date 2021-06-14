@extends('layouts.base')
@section('title', '詳細ページ')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')

@section('content')

<div class="container">
    <h1>{{$results->titile}}</h1>
        <div id="app">
            <like-component :post-id="{{ json_encode($results->id) }}":user-id="{{ json_encode($userAuth) }}":default-liked="{{ json_encode($defaultLiked) }}":default-Count="{{ json_encode($defaultCount) }}"></like-component>
        </div>
         <p> {{$results->titile}} </p>
            <img src="http://localhost:9000/{{$results->postImage->file_path }}" alt="{{$results->postImage->file_name }}">
            <iframe id='map'src='https://www.google.com/maps/embed/v1/place?key={{ config("app.google_api")}}&amp;q={{ $results->address }}' width='100%' height='150' frameborder='0'></iframe>
</div>

        <script src="{{asset('js/app.js')}}"></script>
@endsection