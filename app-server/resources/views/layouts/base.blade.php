<head>
        <meta charset='utf-8'>
        <title>@yield('title')｜●●●</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name = 'viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name="description"  content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <style>body {padding-top: 64px;}</style>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        @yield('pagecss')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    
    <body>
    @include('layouts.nav')
    @yield('content')
   </body>

   <footer class="foot pt-2 pb-3">
    <div class="container">
        <ul class="list-group list-group-horizontal pb-1">
                <li class="list-group-item flex-fill"><a  href="{{route('city.list')}}">トップ</a></li>
                <li class="list-group-item flex-fill"><a  href="{{route('about')}}">サービス紹介</a></li>
                <li class="list-group-item flex-fill"><a  href="{{route('post.new')}}">新規投稿</a></li>
        </ul>
        <p class="copy">© 2021 Copyright<br>shuffle.tokyo</p>
    </div>
</footer>


