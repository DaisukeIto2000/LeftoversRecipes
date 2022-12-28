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
    <section id="pass">
      @section('page-title')
      <div class="pass_title">
        <h1>パスワード再設定メール送信フォーム</h1>
      </div>
      @endsection
        <div class="pass_reset">
          <div class="pass_reset_title">
            <p>パスワード再設定メール送信フォーム</p>
          </div>
          <div class="pass_reset_form">
            <form method="POST" action="{{ route('password_reset.email.send') }}">
              @csrf
              <div>
                <label for="email">メールアドレス:</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                      <span class="error">{{ $message }}</span>
                @enderror
              </div>
              <div class="pass_button">
                <button>再設定用メールを送信</button>
              </div>
            </form>
          </div>
        </div>
    </section>
  </main>
</body>
