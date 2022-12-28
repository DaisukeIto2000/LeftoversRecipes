<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('base_complete.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
  </header>
  <section id="complete">
    <div class="complete_item">
      <div class="title">
        <h1>編集完了</h1>
      </div>
      <div class="complete">
        <p>編集完了しました。</p>
      </div>
      <div class="">
        <a href="my">マイページへ</a>
      </div>
    </div>
  </section>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
