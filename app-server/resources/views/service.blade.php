@extends('layouts.base')

@section('title', 'サービス紹介')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
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
                                        <p class="text-center">東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。</p>
                                        <p class="text-center">東京に引っ越して間もなく、「どこに行けばいいのか分からない」といった方や、東京に長く住んでるものの新しい場所を見つけたい方にオススメです。</p>
                                        <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
                              </div>
          </div>
          <div class="block ">
                    <h1 class="text-center">立ち上げたきっかけ</h1>
                              <div class="max-content">
                                        <p class="text-center">東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。</p>
                                        <p class="text-center">東京に引っ越して間もなく、「どこに行けばいいのか分からない」といった方や、東京に長く住んでるものの新しい場所を見つけたい方にオススメです。</p>
                                        <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
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
                              <h4>ランダムで行き先を決める</h4>
                    </div>
                              <div class="mt-4 randam mx-auto">
                                        <div class="column">
                                        <div class="col-md-6 order1">
                                                  <h5>①行きたい場所を探す</h5>
                                                  <p>トップページから行きたいエリアを選択してください。</p>
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
                                                  <p>カテゴリーを選択してください。</p>
                                        </div>
                                        </div>

                                        <div class="column">
                                        <div class="col-md-6 order5">
                                                  <h5>③お気に入り登録</h5>
                                                  <p>気に入った場所はお気に入り登録。お気に入り登録することで、マイページに表示されるようになります。</p>
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
                              <h4 class="text-left" id="post">新規投稿する</h4>
                              </div>

                              <div class="mt-4 randam mx-auto">
                                        <div class="column">
                                        <div class="col-md-6 order1">
                                                  <h5>①新規アカウント登録</h5>
                                                  <p>アカウントを登録してください。</p>
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
                                                  <p>投稿フォームに情報を入力してくてください。</p>
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