@extends('layouts.base')

@section('title', 'パスワードリセット')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')

@section('head')
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">パスワードを再設定する</h4>
                    <hr>
                    <p class="text-success text-center">Email Addressを入力してください。アカウントにアクセスするためのリンクをお送りします。</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-envelope"></i> </span>
                            </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>  
                    </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('送信') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
