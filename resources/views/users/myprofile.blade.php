@extends('layouts.login')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
<div class='myprofile-container'>
<div class="myprofile-wrapper">

<div class="myprofile1">
<img src="images/dawn.png">
</div>

<div class="myprofile2">
<p>UserName</p>
<br>
<p>MailAdress</p>
<br>
<p>Password</p>
<br>
<p>new Password</p>
<br>
<p>Bio</p>
<br>
<p>Icon Image</p>

</div>

<div class="myprofile3">
<form action="/search" method="post">
  @csrf

  <input type="text" name="username" value="{{ Auth::user()->username }}" readonly="readonly"><br><br>

<input type="email" name="mail" value="{{ Auth::user()->mail }}" readonly="readonly"><br><br>

<input type="text" name="password" placeholder="{{ Auth::user()->password }}"><br><br>
<input type="text" name="password" placeholder="{{ Auth::user()->password }}"><br><br>

<input type="textarea" name="bio" placeholder="自己紹介文" value="{{ Auth::user()->bio }}" readonly="readonly"><br><br>

<input type="file" name="iconimage" value="{{ Auth::user()->images }}" ><br><br>

</form>
</div>

</div>

<input type="submit" class="newprofile" value="更新"><br>

</div>

</body>
</html>


@endsection