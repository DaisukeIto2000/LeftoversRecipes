<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_header_sign.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    <div class="head_sign">
      <div class="header_logo">
        <img src="{{asset('/image/Leftover_Recipe-removebg-preview.png')}}">
      </div>
      <div class="login">
        <div class="login_1">
          <a href="{{ route('login_page')}}">ログイン</a>
        </div>
      </div>
    </div>
  </header>
</body>
<script type="text/javascript">
  $("img").on("click", function() {
    location.href= "index";
  });
</script>
