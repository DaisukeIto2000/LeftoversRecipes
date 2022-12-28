<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_index.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="good_image">
      <div class="img_1">
        <img src="{{ asset('image/24718875_m.jpg') }}">
      </div>
    </section>
    <section id="search">
      <div class="search_title">
        <h1>レシピ検索</h1>
      </div>
      <div class="search_box">
        <form action="search_result">
          <input type="search" class="text_search" name="search" placeholder="食材名・料理名">
          <input type="submit" name="search_button" value="検索">
        </form>
      </div>
    </section>
    <section id="recipe_category">
      <div class="img_cate">
        <div class="category_img">
          <img src="{{ asset('image/24843656_s.jpg') }}">
          <div class="title_cate">
            <p>メイン</p>
          </div>
        </div>
        <div class="category_img">
          <img src="{{ asset('image/24843656_s.jpg') }}">
          <div class="title_cate">
            <p>副菜</p>
          </div>
        </div>
        <div class="category_img">
          <img src="{{ asset('image/24843656_s.jpg') }}">
          <div class="title_cate">
            <p>主食</p>
          </div>
        </div>
        <div class="category_img">
          <img src="{{ asset('image/24843656_s.jpg') }}">
          <div class="title_cate">
            <p>汁物</p>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
