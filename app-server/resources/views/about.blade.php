@extends('layouts.base')

@section('title', 'ぺーじのたいとる')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')
@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/about.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container main">
          <div class="block">
          <h1>●●とは</h1>
          <p>東京23区内のオススメの観光地や、グルメなど、各場所、ジャンルに合わせてランダムで表示してくれるユーザー投稿型ランダムアプリケーションです。</p>
          <p>東京に引っ越して間もなく、「どこに行けばいいのか分からない」といった方や、東京に長く住んでるものの新しい場所を見つけたい方にオススメです。</p>
          <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
          </div>
</div>

<div class="block">
          <div class="container mb-4 mt-5">
          <h2>●●の使い方</h2>
                    <div class="border-bottom">
                    <h3>ランダムで行き先を決める</h3>
                    </div>
                              <div class="randam mt-4">
                                        <div class="col-md-4">
                                        <h5>①行きたい場所を探す</h5>
                                        <p>トップページから行きたいエリアを選択してください。</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h5>②カテゴリーを選択</h5>
                                        <p>カテゴリーを選択してください。</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h5>③お気に入り登録</h5>
                                        <p>気に入った場所はお気に入り登録。お気に入り登録することで、マイページに表示されるようになります。</p>
                                        <p class="list">※一部アカウント登録済みのユーザーしか利用できない機能がございます。</p>
                                        </div>
                                                  <div class="width-btn">
                                                            <div class="text-center">
                                                                      <a class="btn btn-primary" href='/#search'>ランダムで行き先を決める</a>
                                                            </div>
                                                  </div>
                              </div>
          </div>
</div>

<div class="block-bg">
          <div class="container">
                    <div class="border-bottom">
                    <h3>新規投稿する</h3>
                    </div>
                              <div class="randam mt-4">
                                        <div class="col-md-4">
                                        <h5>①新規アカウント登録</h5>
                                        <p>アカウントを登録してください。</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h5>②投稿フォームに情報を入力</h5>
                                        <p>投稿フォームに情報を入力してくてください。</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h5>③承認待ち</h5>
                                        <p>管理者による承認をお待ちください。</p>
                                        <p class="list">※不適切な投稿な場合、承認されない可能性があります。また申請から承認まで最大3~5日かかる可能性がございます。</p>
                                        </div>
                                                  <div class="width-btn">
                                                            <div class="text-center">
                                                            <a class="btn btn-primary" href="{{route('post.new')}}">新規投稿</a>
                                                            </div>
                                                  </div>
                              </div>
          </div>
</div>



@endsection