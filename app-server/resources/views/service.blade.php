@extends('layouts.base')

@section('title', 'サービス紹介')
@section('description', 'shuffle.tokyoは、東京に観光に来たが、どこに行けば良いかわからない。東京に引っ越したが、色々ありすぎてどこに行けば良いかわからない。このようなお悩みを持ってるあなたの悩みを解決するために作られました。')
@section('keywords', 'shuffle.tokyo, 観光,グルメ,東京')
@section('head')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/about.css') }}" rel="stylesheet">
<link href="{{ asset('/css/service.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container main">
          <div class="block mb-5">
                    <div class="text-center">
                    <img src="/images/service_logo.png" class="">
                    </div>
                    <h1 class="text-center">shuffle.tokyoとは</h1>
                              <div class="max-content">
                                        <p class="text-center">東京に観光に来たが、どこに行けば良いかわからない。</p>
                                        <p class="text-center">東京に引っ越したが、色々ありすぎてどこに行けば良いかわからない</p>
                                        <p class="text-center">東京に憧れを持っていたが、結局いつもと同じところに行ってしまってる</p>
                                        <p class="text-center">友人に東京のオススメの場所を聞かれたが、どこが良いかわからない</p>
                                        <br>
                                        <p>このようなお悩みを持った方の悩みを解消するためにこのshuffle.tokyoは開発されました。shuffle.tokyoは各エリア23区ごとの各ジャンルに応じてユーザーのオススメ情報をランダムで表示します。その結果、あなたの「どこに行けばいいかわからない」と行った不安を解消し、新たな挑戦へとサポートします。また、友達と遊んでる時に、少し暇になった時や、自分の住んでいる地域を少し開拓したいと思った時にもご利用になれます。</p>
                                        <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
                              </div>
          </div>
          <div class="block ">
                    <h1 class="text-center">立ち上げたきっかけ</h1>
                              <div class="max-content">
                                        <p class="text-center">大学を卒業し、社会人として東京で1暮らしをするという人も少なくないのではないでしょうか。</p>
                                        <p class="text-center">平日は自宅と会社を行き来するだけで、気がつけば1年が終わっていたなんて話をよく耳にします。</p>
                                        <p class="text-center">社会人も2年目が終わろうとした冬、友人が上京することとなり、東京のオススメを聞かれた私は何も答えることができず、沈黙になってしまいました。</p>
                                        <p class="text-center">このように東京には数々のグルメや、観光地があるにも関わらず、東京を理解できずに、楽しめてない方へもっと東京を楽しんで、後悔して欲しくないという思いも込めて開発しました。</p>
                              </div>
          </div>
</div>

<div class="block-bg">
          <div class="container mb-4 mt-5">
                    <div class="mb-4">
                              <h2 class="text-center">shuffle.tokyoの使い方</h2>
                    </div>
                    <div class="max-content row">
                              <div class="width-btn col-md-6 col-sm-6">
                                        <div class="text-center">
                                                  <a class="btn btn-primary" href='#random'>ランダムで行き先を決める</a>
                                        </div>
                              </div>
                              <div class="width-btn col-md-6 col-sm-6" id="random">
                                        <div class="text-center">
                                                  <a class="btn btn-primary" href='#post'>新規投稿する</a>
                                        </div>
                              </div>
                    </div>
                    <div class="mt-4 randam mx-auto">
                              <h3>ランダムで行き先を決める</h3>
                    </div>
                              <div class="mt-4 randam mx-auto">
                                        <div class="column">
                                        <div class="col-md-6 order1">
                                                  <h5>①行きたい場所を探す</h5>
                                                  <p>トップページから行きたいエリアを選択してください。<br>東京23区から選択することができます。</p>
                                        </div>
                                        <div class="col-md-6 text-center order2">
                                                  <img src="/images/service1.png" class="mx-auto">
                                        </div>
                                        </div>
                                        
                                        <div class="column">
                                        <div class="col-md-6 order4">
                                                  <img src="/images/service2.png" class="mx-auto">
                                        </div>
                                        <div class="col-md-6 text-left order3">
                                                  <h5>②カテゴリーを選択</h5>
                                                  <p>カテゴリーを選択してください。<br>「グルメ」、「観光」の中から選択可能です。</p>
                                        </div>
                                        </div>

                                        <div class="column">
                                        <div class="col-md-6 order5">
                                                  <h5>③お気に入り登録</h5>
                                                  <p>気に入った場所はお気に入り登録。<br>お気に入り登録することで、マイページに表示されるようになります。</p>
                                                  <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
                                        </div>
                                        <div class="col-md-6 text-center order6">
                                                  <img src="/images/service3.png" class="mx-auto">
                                        </div>
                                        </div>
                                                   <div class="width-btn order7">
                                                            <div class="text-center">
                                                                      <a class="btn btn-primary" href='/#search'>ランダムで行き先を決める</a>
                                                            </div>
                                                  </div> 
                              </div>
          </div>
</div> 

<div class="block">
          <div class="container mb-4 mt-5">
                              <div class="mt-4 randam mx-auto">
                              <h3 class="text-left" id="post">新規投稿する</h3>
                              </div>

                              <div class="mt-4 randam mx-auto">
                                        <div class="column">
                                        <div class="col-md-6 order1">
                                                  <h5>①新規アカウント登録</h5>
                                                  <p>アカウントを登録してください。<br>新規アカウント登録には「メールアドレス」、「ユーザーネーム」、「パスワード」が必須になります。</p>
                                        </div>
                                        <div class="col-md-6 text-center order2">
                                                  <img src="/images/service4.png" class="mx-auto">
                                        </div>
                                        </div>

                                        <div class="column">
                                        <div class="col-md-6 order4">
                                                  <img src="/images/service5.png" class="mx-auto">
                                        </div>
                                        <div class="col-md-6 text-left order3">
                                                  <h5>②投稿フォームに情報を入力</h5>
                                                  <p>投稿フォームに情報を入力してください。「場所」、「カテゴリー」、「市区町村」、「住所」は入力必須になります。</p>
                                        </div>
                                        </div>

                                        <div class="column">
                                        <div class="col-md-6 order5">
                                                  <h5>③承認待ち</h5>
                                                  <p>管理者による承認をお待ちください。</p>
                                                  <p class="list">※不適切な投稿な場合、承認されない可能性があります。また申請から承認まで最大3~5日かかる可能性がございます。</p>
                                        </div>
                                        <div class="col-md-6 text-center order6">
                                                  <img src="/images/service6.png" class="mx-auto">
                                        </div>
                                        </div>

                                                   <div class="width-btn order7">
                                                            <div class="text-center">
                                                                      <a class="btn btn-primary" href="{{route('post.new')}}">新規投稿</a>
                                                            </div>
                                                  </div> 
                              </div>
          </div>
</div> 





@endsection