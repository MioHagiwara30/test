@extends('layouts.logout')

@section('content')

<div class="createwrapper">

{!! Form::open(['url'=>'/create']) !!}

<h2>新規ユーザー登録</h2>

<div class="form-wrapper">

<div class="form">
<p>UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input','size' => 30,'placeholder' => 'dawntown']) }}

@if($errors->has('username'))
<p>{{ $errors->first('username')}}</p>
@endif
<br>
</div>

<div class="form">
<p>MailAdress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('email',null,['class' => 'input','size' => 30,'placeholder' => 'dawn@dawn.jp']) }}

@if($errors->has('email'))
<p>{{ $errors->first('email')}}</p>
@endif
<br>
</div>

<div class="form">
<p>Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード']) }}

@if($errors->has('password'))
<p>{{ $errors->first('password')}}</p>
@endif
<br>
</div>

<div class="form">
<p>Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード再入力']) }}

@if($errors->has('password_confirmation'))
<p>{{ $errors->first('password_confirmation')}}</p>
@endif
</div>

</div>

<br>
{{ Form::submit('RESISTER') }}

<p class="back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}



@endsection
