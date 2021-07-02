@extends('layouts.base')

@section('pagecss')
<link href="{{ asset('/css/common.css') }}" rel="stylesheet">
<link href="{{ asset('/css/form.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container main">
<h1>新しいお店</h1>
    @if ($errors->any())
        <div class="error">
            <ul class="error-space"> 
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

{{ Form::open(['route' => 'post.store','enctype' => 'multipart/form-data', 'method'=>'POST' ]) }} 
@csrf

    <div class='form-group'>
    {{ Form::label('titile', '場所:') }}
    {{ Form::text('titile', null,['class' => 'form-control','placeholder' => '例)：明治神宮']) }}
    <span id="helpBlock" class="help-block">255文字以内で入力ください。</span>
    </div>

    <div class='form-group'>
    {{ Form::label('category_id', 'カテゴリー:') }}
    {{ Form::select('category_id', $categories,'ordinarily', ['class' => 'form-control']) }}
    </div>

    <div class='form-group'>
    {{ Form::label('city_id', '市町村:') }}
    {{ Form::select ('city_id', $cities, 'ordinarily', ['class' => 'form-control']) }}
    </div>

    <div class='form-group'>
    {{ Form::label('address', '住所:') }}
    {{ Form::text('address', null,['class' => 'form-control','placeholder'=>'例)：東京都渋谷区代々木神園町１−１']) }}
    <span id="helpBlock" class="help-block">255文字以内で入力ください。</span>
    </div>

    <div class='form-group'> 
    {{ Form::label('image', 'サムネイル:') }}
    <input type="file" name="image" class="form-control">
    <span id="helpBlock" class="help-block">サムネイルがなくても投稿が可能です。</span>
    </div> 

    <div class="width-btn">
    <div class="text-center">
    {{ Form::submit('投稿する', ['class' => 'btn btn-primary']) }}
    </div>
     </div>

{{ Form::close() }} 

</div>



    <script type="text/javascript">
            // {{--失敗時--}}
            @if (session('msg_danger'))
                $(function () {
                    toastr.success('{{ session('msg_danger') }}');
                });
            @endif
</script>
    @endsection