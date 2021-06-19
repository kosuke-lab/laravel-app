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
    @include('layouts.header')
    @yield('content')
   </body>

<footer class="foot">
    <div class="container">
<li>トップ</li>
<li>〇〇について</li>
    </div>
</footer>
