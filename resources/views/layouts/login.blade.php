<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
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
    <script src= "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/style.js')}}"></script>
</head>
<body>
    <header>
        <div class=header-wrapper>
            <div class=header-logo>
              <a href="/top"><img class="header-logo-img" src="{{asset('images/main_logo.png')}}"></a>
            </div>

            <div class="header-wrapper2">
              <div class=header-username>
                <div class="white">
                 <p>{{ Auth::user()->username }} さん</p>
                </div>
                 <div class="gnavi_wrap">
                  <ul class="gnavi_lists">
                   <li class="navi_home">
                    <a class="menu-triangle"> > </a>

                    <ul class="dropdown_lists">
                        <li class="inside_menu"><a class="extendbutton" href="/top">ホーム</a></li>
                        <li class="inside_menu"><a class="extendbutton" href="/myprofile">プロフィール</a></li>
                        <li class="inside_menu"><a class="extendbutton" href="/logout">ログアウト</a></li>
                      </ul>
                   </li>
                  </ul>
                 </div>

                 <img class="top_icon" src="{{asset('images/dawn.png')}}">
                </div>
                </div>

                </div>
               </div>

               </div>

    </header>
    <div id="row">
        <div id="main-wrapper">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                    <p class="gray">{{ Auth::user()->username }}さんの</p>
                    <div class="member-list">
                <div class="f-wrapper">
                <p class="gray">フォロー数</p>
                <p class="gray"> {{$follow_count}} 名</p>
                </div>
                <div class="btn-wrapper">
                <a class="fl btn" href="/follow-list">フォローリスト</a></p>
                </div>
                <div class="f-wrapper">
                  <p class="gray">フォロワー数</p>
                  <p class="gray"> {{$follower_count}} 名</p>
                </div>
                <div class="btn-wrapper">
                  <a class="fl btn" href="/follower-list">フォロワーリスト</a></p>
                </div>
                </div>
             </div>
             <div id="search">
              <a class="fl btn" href="/search-page">ユーザー検索</a>
             </div>
         </div>
    </div>
    <footer>
    </footer>

</body>
</html>