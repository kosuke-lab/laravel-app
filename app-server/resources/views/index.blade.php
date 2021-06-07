<!DOCTYPE html>
    <head>
        <meta charset='utf-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name = 'viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>テスト</title>
        <style>body {padding-top: 64px;}</style>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/top.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>

    <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container">
      <div class="logo">

    <a class="navbar-brand logo" href=''><img src="" class="navbar-brand logo" alt="ロゴ"></a>
  </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href=''>Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=''>〇〇登録</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href=''>〇〇とは</a>
        </li>    
        @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;"></form>
                        @csrf
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('mypage',['user_id' =>auth()->user()->id])}}">mypage</a>
                    </li>   
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
      </ul>
    </div>
  </div>
  </nav>




        <h1>テスト</h1>
            <!-- @foreach ($cities as $city)
            <p><a href="/{{ $city->id}}">{{ $city->name }}</a></p>
        @endforeach -->
        <div id="app">
<form action="{{ route('post.list') }}" method="POST">   
    {{ csrf_field() }}
    <div class="container">
    <div class="radio-tile-group">
    @foreach ($cities as $city)
    <div class="input-container">
    <input value="{{$city->id}}" name="cityId" type="radio"  @click="openModal" class="radio-button">
      <div class="radio-tile">
        <label for="bike" class="radio-tile-label">{{ $city->name }}</label>
      </div>
    </div>    
   @endforeach
   <open-modal v-show="showContent" @close="showContent = false"  :category_datas="{{ json_encode($categories) }}"></open-modal>
</form>
</div>
</div>
</div>

     
    <script type="text/javascript">
            // {{--成功時--}}
            @if (session('msg_success'))
                $(function () {
                    toastr.success('{{ session('msg_success') }}');
                });
            @endif

            // {{--失敗時--}}
            @if (session('msg_danger'))
                $(function () {
                    toastr.success('{{ session('msg_danger') }}');
                });
            @endif
</script>
        <script src="{{asset('js/app.js')}}">
        </script>
    </body>