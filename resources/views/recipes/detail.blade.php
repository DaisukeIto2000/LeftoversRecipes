<?php

?>
@foreach($post_items as $post_item)
@endforeach
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_detail.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
  </header>
  <main>
    <section>
      <div class="det_title">
        <div class="title">
          <h1>{{ $post_item->title }}</h1>
        </div>
      </div>
    </section>
    <section id="det_img">
      <div class="det_img">
        <img src="{{asset('storage/image/'.$post_item->image)}}">
    </section>
    <section>
      <div class="detail_material">
        <div class="mat_title">
          <h2>材料</h2>
        </div>
        <div class="material">
          <ul class="nama">
            @foreach($post_items as $post_item)
            <li>{{ $post_item->name }}</li>
            @endforeach
          </ul>
          <ul class="quantity">
            @foreach($post_items as $post_item)
            <li>{{ $post_item->qty }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>
    <section>
      <div class="process">
        <div class="process_title">
          <h2>作り方</h2>
        </div>
        <div class="process_1">
          <p>{!! nl2br(e($post_item->process)) !!}</p>
        </div>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
