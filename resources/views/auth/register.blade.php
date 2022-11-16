@extends('layouts.logout')

@section('content')

<div class="blackwrapper">
<div class="insidewrapper">

{!! Form::open(['url'=>'/create']) !!}

<h2>新規ユーザー登録</h2>

<div class="form-wrapper">

<div class="name box">
<p>UserName</p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input','size' => 30,'placeholder' => 'dawntown']) }}

@if($errors->has('username'))
<p>{{ $errors->first('username')}}</p>
@endif
<br>
</div>

<div class="mail box">
<p>MailAdress</p>
{{ Form::label('メールアドレス') }}
{{ Form::text('email',null,['class' => 'input','size' => 30,'placeholder' => 'dawn@dawn.jp']) }}

@if($errors->has('email'))
<p>{{ $errors->first('email')}}</p>
@endif
<br>
</div>

<div class="pass box">
<p>Password</p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード']) }}

@if($errors->has('password'))
<p>{{ $errors->first('password')}}</p>
@endif
<br>
</div>

<div class="repass box">
<p>Password confirm</p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input','size' => 30,'placeholder' => '新規パスワード再入力']) }}

@if($errors->has('password_confirmation'))
<p>{{ $errors->first('password_confirmation')}}</p>
@endif
</div>

</div>

<div class="submit">
{{ Form::submit('RESISTER') }}
</div>

<p class="back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</div>
</div>

@endsection
