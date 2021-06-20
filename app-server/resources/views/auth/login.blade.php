@extends('layouts.base')

@section('pagecss')
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">
@endsection
@section('content')


<div class="col-sm-4">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">ログイン</h4>
            <hr>
            <p class="text-success text-center">Some message goes here</p>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email or login">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div> 
                    </div>
                <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div> 
                </div> 

                <div class="form-group">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                {{ __('ログイン') }}
                </button>
                @if (Route::has('password.request'))
                <a  href="{{ route('password.request') }}">
                {{ __('パスワードを忘れた方はこちら') }}
                </a>
                @endif
                    <div class="login-or">
                    <hr class="hr-or">
                    <span class="span-or">or</span>
                    </div>
                        <div>
                        <a href="{{ url('login/twitter')}}" class="btn btn-danger btn-block"><i class="fab fa-twitter"> twitter</i></a>
                        </div>
                </form>
            </div>
        </div>
</div>


@endsection
