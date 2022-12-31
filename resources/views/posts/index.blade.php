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

<div id='container'>

  <div class="tweet-wrapper">
  <div class="tweet-wrapper-inside">
   <img class="icon-tweet" src="images/dawn.png">

   <div class="form-group">
   <form action="/post/create" method="post">
  @csrf
<textarea name="newPost" placeholder="何をつぶやこうか…？" style="width:350px; height:70px;" required></textarea>
</div>
<input type="image" class="icon-sent" src=images/post.png>
</form>


   </div>
  </div>

</div>

<div class="timeline-wrapper">
<table class="timeline-table" >

@foreach($posts as $post)

 <tr class="detailgroup">
 <th><img class="icon-tweet" src="images/dawn.png"></th>
       <th class="tweet_username">{{ $post -> username }}</th>
       <th class="tweet_time">{{ $post -> created_at }}</th>
 </tr>
 <tr class="tweetgroup">
       <th class="tweet_tweet">{{ $post -> posts }}</th>

@if($post->user_id==$auth->id)
       <th> <a class="edit-btn" href="post/{{ $post->id }}/update-form"><img class="icon-edit" src="images/edit.png"></a></th>
       <th> <a class="delete-btn" href="post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除しますか？')"><img class="icon-delete" src="images/trash.png"></a> </th>
@endif
 </tr>

@endforeach

</table>

</div>



</body>
</html>

@endsection