<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_index.css') }}">
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script type="text/javascript">
$(function(){
    var setImg = '#photo';
    var fadeSpeed = 1600;
    var switchDelay = 5000;

    $(setImg).children('img').css({opacity:'0'});
    $(setImg + ' img:first').stop().animate({opacity:'1',zIndex:'20'},fadeSpeed);

    setInterval(function(){
        $(setImg + ' :first-child').animate({opacity:'0'},fadeSpeed).next('img').animate({opacity:'1'},fadeSpeed).end().appendTo(setImg);
    },switchDelay);
});
</script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="good_image">
      <div class="img_1">
        <div id="photo">
          <img class="img" src="{{ asset('image/24718875_m.jpg') }}" alt="">
          <img class="img" src="{{ asset('image/25528664_s.jpg') }}" alt="">
          <img class="img" src="{{ asset('image/25475339_s.jpg') }}" alt="">
        </div>
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
