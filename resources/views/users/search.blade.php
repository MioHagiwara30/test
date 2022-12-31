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
<div class="user_search_wrapper">

<form action="/search" method="post">
  @csrf
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>

</div>

<table class="user_list_wrapper">
  @foreach ($users as $user)
    <tr class="userlisttable">
       <th><a href="post/{{ $user -> id }}/profile">
        <img src={{asset($user -> images)}}></a></th>
       <th a class="a_username" >{{ $user -> username }}</th>
       <th>

       <!-- $followings=フォロワーに自分のidが入っているもの -->
       <form action="/follow/delete" class="a_username" method="post">
        @if($followings->contains('follow',$user->id))
        @csrf
          <input type="hidden"  name="id" value="{{$user -> id }}">
          <input type="submit" class="a_follow" value="フォローを外す">
        </form>
        @elseif($user->id==$auth->id)

        @else
        <form action="/follow/create" class="a_username" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$user -> id }}">
          <input type="submit" class="a_follow" value="フォローする">
        </form>
        @endif

       </th>

    </tr>
  @endforeach

</table>

</div>
</body>
</html>


@endsection