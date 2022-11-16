@extends('layouts.logout')

@section('content')

<div class="black-wrapper">
<div class="added-wrapper">

<div class="clear-wrapper">
<h2>{{ session('username') }}さん</h2>
  <p>ようこそ！DAWNSNSへ</p>

<br>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう</p>
<br>
</div>

<div class="button-wrapper">

<p class="home-btn"><a href="/login">ログイン画面へ</a></p>

</div>
</div>
</div>

@endsection