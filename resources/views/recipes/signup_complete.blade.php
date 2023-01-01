<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_complete.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="complete">
      <div class="complete_item">
        <div class="title">
          <h1>登録完了</h1>
        </div>
        <div class="complete">
          <p>新規登録が完了しました。</p>
        </div>
        <div class="complete">
          <a href="{{ route('login_page')}}">ログインページへ</a>
        </div>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
