<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_header_main.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    <div class="head_main">
      <div class="header_logo">
        <img src="{{asset('/image/Leftover_Recipe-removebg-preview.png')}}">
      </div>
      <ul>
        @if(Auth::check())
        <li class="head_mypage"><a href="my">マイページ</a></li>
        <li class="head_post"><a href="post_screen">投稿</a></li>
        <li class="head_leftovers"><a href="leftovers">余り物検索</a></li>
        <li class="head_logout"><a href="{{ route('logout') }}">ログアウト</a></li>
        @endif
        @if(!Auth::check())
        <li><a href="{{ route('login_page')}}">ログイン</a></li>
        @endif
      </ul>
    </div>
  </header>
</body>
<script type="text/javascript">
  $("img").on("click", function() {
    location.href= "index";
  });
</script>
