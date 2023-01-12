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
  <div class="followmembers-wrapper">
    <h1 class="gray">Follow list</h1>
    <div class="members_inside">
  @foreach ($follows as $follow)
    <tr class="userlisttable">
       <th>
        <th><a href="post/{{$follow->id}}/profile"><img src="{{asset($follow -> images)}}"></a></th>

          <th a class="a_username" >{{ $follow -> username }}</th>

        </th>
  @endforeach
  </div>
</table>
</div>
</div>

</body>
</html>
@endsection
