<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_login.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="login_recipe">
      <div class="login_form">
        <div class="login_title">
          <h1>ログイン</h1>
        </div>
        <div class="login_txt">
          <form action="mypage" method="post">
            @csrf
            <div class="login_email">
              <input type="email" name="email" placeholder="メールアドレスを入力してください">
            </div>
            @if ($errors->has('email'))
                <p class="error_list">{{$errors->first('email')}}</p>
            @endif
            <div class="login_pass">
              <input type="password" name="password" placeholder="パスワードを入力してください">
            </div>
            @if ($errors->has('password'))
                <p class="error_list">{{$errors->first('password')}}</p>
            @endif
            <div class="login_forget">
              <a href="{{ route('password_reset.email.form') }}">パスワード忘れた方はこちらへ</a>
            </div>
            <div class="login_btn">
              <input type="submit" name="login_btn" value="ログイン">
            </div>
            <div class="sign_up">
              <a href="signup">新規登録はこちら</a>
            </div>
            <div class="">
              <a href="administrator">管理者はこちら</a>
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
<script type="text/javascript">
</script>
