<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>テスト</title>
        <style>body {padding: 10px;}</style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>

<style>
#content{
  z-index:10;
  width:50%;
  padding: 1em;
  background:#fff;
}

   #overlay {
       z-index: 1;
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background-color: rgba(0, 0, 0, 0.5);
       display: flex;
       align-items: center;
       justify-content: center;
   }
</style>
    <body>
    

    <div id="app" class="p-4">
   <button type="button" @click="openModal" class="btn btn-primary">モーダルウィンドウを開く</button>
   <open-modal v-show="showContent" @close="showContent = false"   :cityid="{{ json_encode($cities) }}"></open-modal>



    @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('mypage',['user_id' =>auth()->user()->id])}}">mypage</a>

                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                          
                        @endif
                    @endauth
                </div>
            @endif
        <h1>テスト</h1>
            @foreach ($cities as $city)
            <p><a href="/{{ $city->id}}">{{ $city->name }}</a></p>
        @endforeach

     
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
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>