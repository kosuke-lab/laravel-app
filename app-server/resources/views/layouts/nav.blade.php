<nav class="navbar navbar-expand-sm navbar-dark bg-navi fixed-top">
    <div class="container">
      <div class="logo">

    <a class="navbar-brand logo" href='/'><img src="/images/logo.png" class="navbar-brand logo" alt="ロゴ"></a>   
  </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href='/'>トップ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('post.new')}}">新規投稿</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">サービス紹介</a>
        </li>    
        @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">@csrf</form>
                        
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('mypage',['user_id' =>auth()->user()->id])}}">マイページ</a>
                    </li>   
                    @else
                        <a  class="nav-link"href="{{ route('login') }}">ログイン</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">新規アカウント作成</a>
                        @endif
                    @endauth
            @endif
      </ul>
    </div>
  </div>
  </nav>
