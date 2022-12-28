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
    <section id="pass">
      @section('page-title')
      <div class="pass_title">
        <h1>パスワードリセットメール送信完了</h1>
      </div>
      @endsection
        <div class="pass_reset">
          <div class="pass_reset_title">
            <p>パスワードリセットメール送信完了</br>パスワードリセットメールを送信しました。</p>
          </div>
        </div>
    </section>
    <footer>
      @include('recipes.footer')
    </footer>
</body>
