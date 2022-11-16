@extends('layouts.logout')

@section('content')

<h2>Social Network Service</h2>
<br>
<br>
<br>
<div class="blackwrapper">
  <div class="insidewrapper">

{!! Form::open() !!}

<p class="maintext">DAWNのSNSへようこそ</p>

<div class="form-wrapper">
<div class="name box">
<p>MailAdress</p>
<!-- {{ Form::label('mailAdress') }}<br> -->
{{ Form::text('mail',null,['class' => 'input','size' => 30]) }}
</div>

<div class="pass box">
<p>Password</p>
<!-- {{ Form::label('password') }}<br> -->
{{ Form::password('password',['class' => 'input','size' => 30]) }}
</div>
</div>


<div class="submit">
{{ Form::submit('ログイン') }}
</div>

<br><br>
<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

</div>
</div>
@endsection

