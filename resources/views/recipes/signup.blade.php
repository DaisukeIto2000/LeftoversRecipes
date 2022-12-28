<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_signup.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="signup_recipe">
      <div class="signup_text">
        <div class="signup_title">
          <h1>新規登録</h1>
        </div>
        <div class="signup_form">
          <form action="signup_complete" method="post">
            {{csrf_field()}}
            <div class="signup_email">
              <input type="email" name="email" placeholder="メールアドレスを入力してください">
            </div>
            @if ($errors->has('email'))
                <p class="error_list">{{$errors->first('email')}}</p>
            @endif
            <div class="signup_pass">
              <input type="password" name="password" placeholder="パスワードを入力してください">
            </div>
            @if ($errors->has('password'))
                <p class="error_list">{{$errors->first('password')}}</p>
            @endif
            <div class="signup_pass_conf">
              <input type="password" name="password_confirmation" placeholder="パスワード（確認用)">
            </div>
            @if ($errors->has('password_confirmation'))
                <p class="error_list">{{$errors->first('password_confirmation')}}</p>
            @endif
            <div class="signup_submit">
              <input type="submit" name="submit" value="送信">
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
