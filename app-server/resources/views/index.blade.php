@extends('layouts.base')

@section('title', 'トップページ')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/top.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
        <open-modal v-show="showContent" @close="showContent = false"  :category_datas="{{ json_encode($categories) }}"></open-modal>
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

            window.addEventListener('pageshow',()=>{
                if(window.performance.navigation.type==2) location.reload();
            });

            
</script>
<script src="{{asset('js/app.js')}}"> </script>

<!-- <script>
  $(function () {
    $('.radio-button').on('click', function(event) {
      // 既定の動作をキャンセル(今回はinputにcheckedが入るのをキャンセル)
    //   event.preventDefault();
      
      // チェック済みの場合はチェックを外し、未チェックの場合はチェックを入れる
      var $input = $(this).find('input');
      $input.prop('checked', !$input.prop('checked'));
    });
  });
</script> -->

<script>
    var radio_val;
    $('input[name="cityId"]').on('click',function(){
        console.log(radio_val)
	if($(this).val() == radio_val) {
		$(this).prop('checked', true);
		radio_val = null;
	} else {
        radio_val = $(this).val();
        // console.log(radio_val)
	}
}); 

</script>
<script type="text/javascript"></script>






    @endsection
    