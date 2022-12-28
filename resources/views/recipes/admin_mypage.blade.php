<?php

?>
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
@can('isAdmin')
<body>
  @yield('btn-dell') <!--削除確認処理-->
  @yield('js-validation') <!--入力チェック処理-->
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="user">
      <div class="user_item">
        <div class="user_title">
          <h1>ユーザー検索</h1>
        </div>
        <div class="user_seach">
          <form action="" method="get">
            @csrf
            <div class="user_text">
              <input type="text" name="user_email" placeholder="メールアドレスを入力してください" value="">
            </div>
            <div class="user_search">
              <input type="submit" value="検索">
            </div>
          </form>
        </div>
      </div>
      <div class="user_result">
        @foreach($user_items as $user_item)
        <table>
          <tr>
            <td>{{ $user_item->email }}</td>
            <td>
              <form action="{{ route('user_destroy', ['id'=>$user_item->id]) }}" method="POST">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger btn-dell" value="削除">
              </form>
            </td>
          </tr>
        </table>
        @endforeach
      </div>
    </section>
    <section id="recipe">
      <div class="recipe_item">
        <div class="recipe_title">
          <h1>レシピ名検索</h1>
        </div>
        <div class="recipe_seach">
          <form action="" method="get">
            @csrf
            <div class="recipe_text">
              <input type="text" name="recipe_name" placeholder="レシピ名を入力してください" value="">
            </div>
            <div class="recipe_search">
              <input type="submit" value="検索">
            </div>
          </form>
          <div class="recipe_result">
            @foreach($recipe_items as $recipe_item)
            <table>
              <tr>
                <td>{{ $recipe_item->title }}</td>
                <td>{{ $recipe_item->email }}</td>
                <td>
                  <form action="detail" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="recipe_id" value="{{ $recipe_item->id }}">
                    <button type="submit">詳細</button>
                  </form>
                </td>
                <td>
                  <form action="edit" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="recipe_id" value="{{ $recipe_item->id }}">
                    <button type="submit">編集</button>
                  </form>
                </td>
                <td>
                  <form action="{{ route('recipe_destroy', ['id'=>$recipe_item->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger btn-dell" value="削除">
                  </form>
                </td>
              </tr>
            </table>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
@else
<header>
  @include('recipes.header_sign')
</header>
<main>
  <section>
    <div class="">
      <p>管理者のみユーザ一覧が表示されます。</p>
    </div>
    <div class="">
      <a href="{{ route('login_page')}}">ログインページ</a>
    </div>
  </section>
</main>
<footer>
  @include('recipes.footer')
</footer>
@endcan
<script>
$(function (){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
            // そのままsubmit処理を実行（※削除）
        }else{
            // キャンセル
            return false;
        }
    });
});
</script>
