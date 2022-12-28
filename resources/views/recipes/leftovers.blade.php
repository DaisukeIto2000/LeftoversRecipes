<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_leftvers.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://kit.fontawesome.com/106bdd6bb5.js" crossorigin="anonymous"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
  </header>
  <section id="recipe_seach">
    <div class="leftvers_title">
      <h1>余り物レシピ検索</h1>
    </div>
    <form action="leftovers" method="get">
      @csrf
      <li class="text_material">
        <div class="title">
          <p>材料名</p>
        </div>
        <ol id="order_list">
          <li><input type="text" class="text_order_list" name="order_list[]" placeholder="材料入力" value=""></li>
        </ol>
        <li class="add"><input id="btn_add" type="button" value="行を追加"><li>
      </li>
      <div class="genre">
        <div class="genre_text">
          <p>レシピのジャンルを絞り込む場合は選択してください</p>
        </div>
        <div class="checkbox">
          <p>
            <input type="checkbox" name="genre_1" value="メイン">メイン
            <input type="checkbox" name="genre_2" value="副菜">副菜
            <input type="checkbox" name="genre_3" value="主食">主食
            <input type="checkbox" name="genre_4" value="汁物">汁物
          </p>
        </div>
      </div>
      <div class="search">
        <div class="">
          <input type="submit" value="検索">
        </div>
      </div>
    </form>
  </section>
  <section id="recipe_items">
    <div class="recipe_posted">
      <?php if(!empty($items)){ ?>
        @foreach ($items as $item)
          <div class="items">
            <div class="recipe_img">
              <img src="{{asset('storage/image/'.$item->image)}}">
            </div>
            <div class="recipe_category">
              <ul>
                <li>レシピ名:{{ $item->title }}</li>
                <li>ジャンル:{{ $item->genre }}</li>
              </ul>
              <div class="">
                <form action="detail" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="recipe_id" value="{{ $item->id }}">
                  <button type="submit">詳細</button>
                </form>
              </div>
              <!-- 参考：$itemにはReviewControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
              @auth
              <!-- Recipe.phpに作ったisLikedByメソッドをここで使用 -->
              <?php if(!empty($item)){ ?>
                @if (!$item->isLikedBy(Auth::user()))
                  <span class="likes">
                      <i class="fa-regular fa-heart like-toggle" data-recipe-id="{{ $item->id }}"></i>
                      <span class="like-counter">{{$item->likes_count}}</span>
                  </span><!-- /.likes -->
                @else
                  <span class="likes">
                      <i class="fas fa-regular fa-heart heart like-toggle liked" data-recipe-id="{{ $item->id }}"></i>
                      <span class="like-counter">{{$item->likes_count}}</span>
                  </span><!-- /.likes -->
                @endif
              <?php } ?>
              @endauth
            </div>
          </div>
        @endforeach
      <?php } ?>
    </div>
    <div class="pages">
    </div>
  </section>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
<script type="text/javascript">
$(function () {
  'use strict';
  var prefix_order_list = 'order_list[]'; // 品目入力欄のname属性の接頭辞

  // "品目の追加"ボタンを押した場合の処理
  $('#btn_add').click(function () {
    var i, new_btn, len_list, new_list;

    // 品目入力欄を追加
    len_list = $('#order_list > li').length;
    new_list = '<li><input type="text" size="20" class="text_order_list" name="' + prefix_order_list + '"></li>';
    $('#order_list').append(new_list);

    // 削除ボタンの一旦全消去し、配置し直す
    $('#order_list input[type="button"]').remove();
    len_list += 1;
    for (i = 0; i < len_list; i += 1) {
      new_btn = '<input type="button" class="del" value="削除">';
      $('#order_list > li').eq(i).append(new_btn);
    }
  });

  // 削除ボタンを押した場合の処理
  $(document).on('click', '#order_list input[type="button"]', function (ev) {
    var i, idx, len_list;

    // 品目入力欄を削除
    idx = $(ev.target).parent().index();
    $('#order_list > li').eq(idx).remove();

    len_list = $('#order_list > li').length;

    // 入力欄がひとつになるなら、削除ボタンは不要なので消去
    if (len_list === 1) {
      $('#order_list input[type="button"]').remove();
    }

    // 入力欄の番号を振り直す
    for (i = 0; i < len_list; i += 1) {
      $('#order_list > li').eq(i).children('input[type="text"]').attr('name', prefix_order_list + i);
    }
  });
});
</script>
<script>
$(function () {
let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
let likeRecipeId; //変数を宣言（なんでここで？）
  like.on('click', function () { //onはイベントハンドラー
    let $this = $(this); //this=イベントの発火した要素＝iタグを代入
    likeRecipeId = $this.data('recipe-id'); //iタグに仕込んだdata-review-idの値を取得
    //ajax処理スタート
    $.ajax({
      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
      url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
      method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
      data: { //サーバーに送信するデータ
        'recipe_id': likeRecipeId //いいねされた投稿のidを送る
      },
    })
    //通信成功した時の処理
    .done(function (data) {
      $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
      $this.next('.like-counter').html(data.recipe_likes_count);
    })
    //通信失敗した時の処理
    .fail(function () {
      console.log('fail');
    });
  });
});
</script>
