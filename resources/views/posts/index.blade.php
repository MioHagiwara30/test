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

<div class='container'>

  <div class="tweet-wrapper">
  <div class="tweet-wrapper-inside">
   <img class="icon-tweet" src="images/dawn.png">
   <p class="graytext">何をつぶやこうか…？</p>
   <a href="post/create-form"><img class="icon-sent" src="images/post.png"></a>


   </div>
  </div>

</div>

<div class="timeline-wrapper">
<table class="timeline-table">

@foreach($posts as $post)
<tr>
    <th>{{ $post -> user_id }}</th>
    <th>{{ $post -> posts }}</th>
</tr>
@endforeach

</table>

</div>



</body>
</html>

@endsection