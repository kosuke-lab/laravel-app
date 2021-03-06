@extends('layouts.base')

@section('title', 'トップページ')
@section('description', 'shuffle.tokyoは東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。会員登録なしでご利用になれます。')
@section('keywords', 'shuffle.tokyo,東京,グルメ,観光,TOKYO')
@section('head')
<meta property="og:type" content="website">
<meta property="og:url" content="https://shuffle.tokyo/" />
<meta property="og:image" content="https://shuffle.tokyo/images/top_kv.jpeg" />
<meta property="twitter:title" content="トップページ | shuffle.tokyo" />
<meta property="twitter:description" content="shuffle.tokyoは東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。会員登録なしでご利用になれます。" />
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:image" content="https://shuffle.tokyo/images/top_kv.jpeg" />
<link rel="canonical" href="https://shuffle.tokyo/">
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/top.css') }}" rel="stylesheet">
<script type="application/ld+json">
{
    "@context":"http://schema.org",
    "@type":"website",
    "name":"shuffle.tokyo",
    "inLanguage":"jp", 
    "publisher": {
    "@type": "Organization",
    "name": "shuffle.tokyo",
    "logo": {
        "@type": "ImageObject",
        "url": "https://shuffle.tokyo/images/top_kv.jpeg"
    }},
    "copyrightYear":"2019-01-02T10:50:37+0000",//コピーライトの日付
"headline":"トップページ｜shuffle.tokyo 東京をランダムで案内",
    "description":"shuffle.tokyoは東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。会員登録なしでご利用になれます。",
"url":"https://shuffle.tokyo/"
}
</script>
@endsection

@section('content')
  

<div class="container-fluid">
  <div class="row">
    <img src="{{ asset('images/top_kv.jpeg')}}" class="img-fluid">
  </div>
</div>

<div class="block">
  <div class="container">
    <h2>サービス紹介</h2>
    <div class="row">
        <div class="col-md-6 col-sm-12">
        <p>東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーション。東京に引っ越して間もない方や、東京で長く住んでいるが、まだまだ東京のことを知りたい方にとってオススメアプリケーションです。</p>
        </div>
          <div class="col-md-6">
              <div class="circle-image">
              </div>
          </div>
    </div>
  </div>
</div>

<div class="block">
    <div class="container" id="search">
            <h2 class="headingstyle02">23区から探す</h2>

      <div id="app">
      <form action="{{ route('post.list') }}" method="POST" id="back" autocomplete="off">   
          {{ csrf_field() }}

      <div class="">
          <div class="clearfix">
              <div class="border-bottom">
              <h3>都心</h3>
              </div>
                  <div class="float-left">
                      <div class="radio-tile-group">
                      @foreach ($cities_center as $city)
                          <div class="input-container">
                          <input value="{{$city->id}}" name="cityId" type="radio"  @click="openModal" class="radio-button" autocomplete="on">
                              <div class="radio-tile">
                                  <div class="icon">
                                      <img src="{{ asset('images/' .$city->file_path)}}">
                                  </div>
                              <label  class="radio-tile-label">{{ $city->name }}</label>
                              </div>
                          </div>    
                      @endforeach
                      </div>
                  </div>
      </div>

      <div class="clearfix">
              <div class="border-bottom">
              <h3>副都心</h3>
              </div>
                  <div class="float-left">
                      <div class="radio-tile-group">
                      @foreach ($cities_subcenter as $city)
                          <div class="input-container">
                              <input value="{{$city->id}}" name="cityId" type="radio"  @click="openModal" class="radio-button">
                                <div class="radio-tile">
                                  <div class="icon">
                                      <img src="{{ asset('images/' .$city->file_path)}}" alt="{{$city->file_path}}">
                                  </div>
                                <label for="cityId" name="cityId" class="radio-tile-label">{{ $city->name }}</label>
                                </div>
                          </div>    
                      @endforeach
                      </div>
                  </div>
      </div>

      <div class="clearfix">
              <div class="border-bottom">
                <h3>東部</h3>
              </div>
                  <div class="float-left">
                      <div class="radio-tile-group">
                      @foreach ($cities_east as $city)
                          <div class="input-container">
                          <input value="{{$city->id}}" name="cityId" type="radio"  @click="openModal" class="radio-button">
                              <div class="radio-tile">
                                  <div class="icon">
                                      <img src="{{ asset('images/' .$city->file_path)}}">
                                  </div>
                              <label  class="radio-tile-label">{{ $city->name }}</label>
                              </div>
                          </div>    
                      @endforeach
                      </div>
                  </div>
      </div>

      <div class="clearfix">
              <div class="border-bottom">
                <h3>西部</h3>
              </div>
                  <div class="float-left">
                      <div class="radio-tile-group">
                      @foreach ($cities_west as $city)
                          <div class="input-container">
                          <input value="{{$city->id}}" name="cityId" type="radio"  @click="openModal" class="radio-button">
                              <div class="radio-tile">
                                  <div class="icon">
                                    <img src="{{ asset('images/' .$city->file_path)}}">
                                  </div>
                              <label  class="radio-tile-label">{{ $city->name }}</label>
                              </div>
                          </div>    
                      @endforeach
                      </div>
                  </div>
      </div> 
        <open-modal v-show="showContent" @close="showContent = false"></open-modal>
        </div>
      </div>
    </form>
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

            var radio_val;
            $('input[name="cityId"]').on('click',function(){
            if($(this).val() == radio_val) {
                $(this).prop('checked', true);
                radio_val = null;
            } else {
                radio_val = $(this).val();
                // console.log(radio_val)
            }
}); 
            
</script>
<script src="{{asset('js/app.js')}}"> </script>







    @endsection
    