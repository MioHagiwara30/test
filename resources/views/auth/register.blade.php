@extends('layouts.logout')

@section('content')

<div class="black-wrapper">
<div class="register-wrapper">

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<div class="form-wrapper">

<div class="left-wrapper">
<div class="name box">
<p class="left-text">UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input','size' => 30,'placeholder' => 'dawntown']) }}

@if($errors->has('username'))
<p>{{ $errors->first('username')}}</p>
@endif
<br>
</div>

<div class="mail box">
<p class="left-text">MailAdress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input','size' => 30,'placeholder' => 'dawn@dawn.jp']) }}

@if($errors->has('mail'))
<p>{{ $errors->first('mail')}}</p>
@endif
<br>
</div>

<div class="pass box">
<p class="left-text">Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード']) }}

@if($errors->has('password'))
<p>{{ $errors->first('password')}}</p>
@endif
<br>
</div>

<div class="repass box">
<p class="left-text">Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード再入力']) }}

@if($errors->has('password_confirmation'))
<p>{{ $errors->first('password_confirmation')}}</p>
@endif
</div>
</div>

<div class="submit btn">
{{ Form::submit('RESISTER') }}
</div>

</div>
<p class="back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</div>
</div>

@endsection
