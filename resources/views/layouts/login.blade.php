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
</head>
<body>
    <header>
        <div id = "head">
            <div class=header-wrapper>
               <div class=header-logo>
                <h1><a href="top"><img src="images/main_logo.png"></a></h1>
               </div>
            <!-- <div id="">
                <div id=""> -->
               <div class=header-username>
                <p>{{ Auth::user()->username }}さん<img src="images/dawn.png"></p>
               </div>
                 <div class=gnavi_wrap>

                 <ul class="menu">
                    <li class="menu__single">
                     <a href="#" class="init-bottom">Menu single</a>
                      <ul class="menu__second-level">
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/myprofile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                      </ul>
                     </li>
                  </div>
            <!-- </div> -->
                </div>
    </header>
    <div id="row">
        <div id="main-wrapper">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                    <p>{{ Auth::user()->username }}さんの</p>
                    <div class="member-list">
                <div class="f-wrapper">
                <p>フォロー数</p>
                <p>$follow_count名</p>
                </div>
                <div class="btn-wrapper">
                <a class="fl btn" href="follow-list">フォローリスト</a></p>
                </div>
                <div class="f-wrapper">
                  <p>フォロワー数</p>
                  <p>$follower_count名</p>
                </div>
                <div class="btn-wrapper">
                  <a class="fl btn" href="follower-list">フォロワーリスト</a></p>
                </div>
                </div>
             </div>
             <div id="search">
              <a class="fl btn" href="search-page">ユーザー検索</a>
             </div>
         </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>