<?php
ini_set('display_errors', "On");
session_start();
$_SESSION['user_id'] = $user_id;

?>
<tr>
@foreach($recipe_items as $recipe_item)
@endforeach
@foreach($likes_items as $like_item)
@endforeach
</tr>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_mypage.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/106bdd6bb5.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
    <input type="hidden" value="<?php echo $_SESSION['user_id'];?>">
  </header>
  <main>
    <section id="mypage_title">
      <div class="mypage_title">
        <h1>投稿履歴</h1>
      </div>
    </section>
    <section id="post_items">
      <div class="recipe_posted">
        @foreach($recipe_items as $recipe_item)
        <div class="items">
          <div class="recipe_img">
            <img src="{{asset('storage/image/'.$recipe_item->image)}}">
          </div>
          <div class="recipe_category">
            <ul>
              <li>レシピ名:{{ $recipe_item->title }}</li>
              <li>投稿日時:{{ $recipe_item->created_at }}</li>
            </ul>
            <div class="">
              <form action="detail" method="post">
                {{csrf_field()}}
                <input type="hidden" name="recipe_id" value="{{ $recipe_item->id }}">
                <button type="submit">詳細</button>
              </form>
              <form action="edit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="recipe_id" value="{{ $recipe_item->id }}">
                <button type="submit">編集</button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="pages">
      </div>
    </section>
    <section id="my_goods">
      <div class="good_title">
        <h2>いいね一覧</h2>
      </div>
    </section>
    <section id="recipes_my_goods">
      <div class="recipes_goods">
        @foreach($likes_items as $like_item)
        <div class="items">
          <div class="recipe_img">
            <img src="{{asset('storage/image/'.$like_item->image)}}">
          </div>
          <div class="recipe_category">
            <ul>
              <li>レシピ名:{{ $like_item->title }}</li>
            </ul>
            <form action="detail" method="post">
              {{csrf_field()}}
              <input type="hidden" name="recipe_id" value="{{ $like_item->id }}">
              <button type="submit">詳細</button>
            </form>
            <!-- 参考：$itemにはReviewControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
            @auth
            <!-- Recipe.phpに作ったisLikedByメソッドをここで使用 -->
            <?php if(!empty($like_item)){ ?>
              @if (!$like_item->isLikedBy(Auth::user()))
                <span class="likes">
                    <i class="fa-regular fa-heart like-toggle" data-recipe-id="{{ $like_item->id }}"></i>
                    <span class="like-counter">{{$like_item->likes_count}}</span>
                </span><!-- /.likes -->
              @else
                <span class="likes">
                    <i class="fas fa-regular fa-heart heart like-toggle liked" data-recipe-id="{{ $like_item->id }}"></i>
                    <span class="like-counter">{{$like_item->likes_count}}</span>
                </span><!-- /.likes -->
              @endif
            <?php } ?>
            @endauth
          </div>
        </div>
        @endforeach
      </div>
      <div class="pages">
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
<script type="text/javascript">
  $("").on("click", function() {
    location.href= "login";
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
