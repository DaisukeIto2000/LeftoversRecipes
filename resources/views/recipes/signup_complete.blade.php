<?php
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section>
      <div class="">
        <h1>登録完了</h1>
      </div>
      <div class="">
        <p>新規登録が完了しました。</p>
      </div>
    </section>
    <section>
      <div class="">
        <a href="{{ route('login_page')}}">ログインページへ</a>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
