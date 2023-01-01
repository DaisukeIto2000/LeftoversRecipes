<?php
ini_set('display_errors', "On");
session_start();
$user_id = (int)$_POST['user_id'];
$_SESSION["recipe_name"] = $_POST["recipe_name"];
$_SESSION["text_1"] = $_POST["text_1"];
$_SESSION["text_2"] = $_POST["text_2"];
$_SESSION["genre"] = $_POST["genre"];
$_SESSION["process"] = $_POST["process"];


if(isset($_SESSION["recipe_name"]) == true){
  $_SESSION["recipe_name"] = htmlspecialchars($_SESSION["recipe_name"], ENT_QUOTES);
}else{
  $_SESSION["recipe_name"] = "";
}
if(isset($_SESSION["text_1[]"]) == true){
  $_SESSION["text_1[]"] = htmlspecialchars($_SESSION["text_1[]"], ENT_QUOTES);
}else{
  $_SESSION["text_1[]"] = "";
}
if(isset($_SESSION["text_2[0]"]) == true){
  $_SESSION["text_2[0]"] = htmlspecialchars($_SESSION["text_2[0]"], ENT_QUOTES);
}else{
  $_SESSION["text_2[0]"] = "";
}
if(isset($_SESSION["genre"]) == true){
  $_SESSION["genre"] = htmlspecialchars($_SESSION["genre"], ENT_QUOTES);
}else{
  $_SESSION["genre"] = "";
}
if(isset($_SESSION["process"]) == true){
  $_SESSION["process"] = htmlspecialchars($_SESSION["process"], ENT_QUOTES);
}else{
  $_SESSION["process"] = "";
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_complete.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
  </header>
  <section id="complete">
    <div class="complete_item">
      <div class="title">
        <h1>投稿画面</h1>
      </div>
      <div class="complete">
        <p>投稿完了しました。</p>
      </div>
      <div class="complete">
        <a href="post_screen">続けて投稿する場合はこちらへ</a>
      </div>
    </div>
  </section>
  <div class="display_none">
    <tr>{{$recipe_name}}<tr>
    <tr>{{$process}}<tr>
    <tr>{{$text_1[0]}}<tr>
    <tr>{{$text_2[0]}}<tr>
  </div>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
