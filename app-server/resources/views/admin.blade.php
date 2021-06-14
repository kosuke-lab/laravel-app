@extends('layouts.base')
@section('title', '管理者ページ')
@section('description', 'ぺーじのたいとる')
@section('keywords', 'ぺーじのたいとる')

@section('pagecss')
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">

        <p>{{ $statuses[1]}}</p>
    {{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class='form-group'>
        {{ Form::label('keyword', 'キーワード:') }}
        {{ Form::text('keyword', null, ['class' => 'form-control']) }}
    </div>
    <div class='form-group search'>
        {{ Form::submit('検索', ['class' => 'btn btn-outline-primary'])}}
        <a href={{ route('admin') }} class="btn btn-light">クリア</a>
    </div>
{{ Form::close() }}

<table class='table table-striped table-hover'>
    <tr>
              <th>ID</th>
              <th>場所</th>
              <th>ステータス</th>
    </tr>
    @foreach ($posts as $post)
              <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->titile }}</td>
                         <td><a href="{{ route('admin.edit',$post->id)}}">{{ $statuses[$post->status_id] }}</a></td>
              </tr>
              @endforeach
    </table>
    </div>




     
@endsection