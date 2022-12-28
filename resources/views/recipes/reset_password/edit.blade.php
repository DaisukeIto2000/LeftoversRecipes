<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_email_form.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_sign')
  </header>
  <main>
    <section id="pass_edit">
      <div class="pass_edit">
        <div class="pass_edit_title">
          <h1>新パスワード入力フォーム</p>
        </div>
        <div class="pass_edit_title">
          <h2 class="title">新しいパスワードを設定</h2>
        </div>
        <div class="edit_form">
          <form method="POST" action="{{ route('password_reset.update') }}">
            @csrf
              <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
              <div class="input-group1">
                  <input type="password" name="password" placeholder="パスワード入力を入力してください" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">
                  @error('password')
                      <div class="error">{{ $message }}</div>
                  @enderror
                  @error('token')
                      <div class="error">{{ $message }}</div>
                  @enderror
              </div>
              <div class="input-group2">
                  <input type="password" placeholder="パスワード再入力" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
              </div>
              <div class="pass_edit_button">
                <button type="submit">パスワードを再設定</button>
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
