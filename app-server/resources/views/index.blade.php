@extends('layouts.base')

@section('title', 'ぺーじのたいとる')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
  

  <div class="container-fluid">
    <div class="row">
  <img src="{{ asset('images/top_mv.jpg')}}" class="img-fluid">
  </div>
  </div>

  <div class="block">
<div class="container">
  <h2>サービス紹介</h2>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <p>あああああああああああああああああ</p>
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
        <label for="bike" class="radio-tile-label">{{ $city->name }}</label>
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
        <label for="bike" class="radio-tile-label">{{ $city->name }}</label>
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
        <label for="bike" class="radio-tile-label">{{ $city->name }}</label>
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
        <label for="bike" class="radio-tile-label">{{ $city->name }}</label>
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
        <script>
window.addEventListener('pageshow',()=>{
  if(window.performance.navigation.type==2) location.reload();
});
</script>
        <script src="{{asset('js/app.js')}}">
        </script>


    @endsection