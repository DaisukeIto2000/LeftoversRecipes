<?php
?>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_search_result.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="result_title">
      <div class="result_title">
        <h1>レシピ検索結果</h1>
      </div>
    </section>
    <section id="post_items">
      <div class="recipe_posted">
        <?php if(!empty($items)){ ?>
        @foreach($items as $item)
        <div class="items">
          <div class="recipe_img">
            <img src="{{asset('storage/image/'.$item->image)}}">
          </div>
          <div class="recipe_category">
            <ul>
              <li>レシピ名:{{ $item->title }}</li>
            </ul>
            <form action="detail" method="post">
              {{csrf_field()}}
              <input type="hidden" name="recipe_id" value="{{ $item->id }}">
              <button type="submit">詳細</button>
            </form>
          </div>
        </div>
        @endforeach
        <?php } ?>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
