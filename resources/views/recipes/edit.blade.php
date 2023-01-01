<?php
session_start();
if(!empty($_POST['recipe_id'])){
  $_SESSION['id'] = $_POST['recipe_id'];
}
?>
@foreach($post_items as $post_item)
@endforeach

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>recipes_top</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/base_post.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="jquery-bgswitcher-master/jquery.bgswitcher.js"></script>
</head>
<body>
  <header>
    @include('recipes.header_main')
  </header>
  <section id="post_form">
    <div class="post_form">
      <form action="edit_complete" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="recipe_id" value="<?php echo  $_SESSION['id']; ?>">
        <div class="post_title">
          <h1>編集画面</h1>
        </div>
        <div class="recipe_name">
          <input type="text" name="title" placeholder="レシピ名" <?php if(!empty($post_item->title)) {?>value="{{ $post_item->title }}"<?php } ?>>
        </div>
        @if ($errors->has('title'))
            <p class="error_list">{{$errors->first('title')}}</p>
        @endif
        <div class="recipe_post_img">
          <div class="img_file">
            <input type="file" name="recipe_file" accept="image/png, image/jpeg, application/pdf" enctype="multipart/form-data" onchange="previewFile(this);">
          </div>
          @if ($errors->has('recipe_file'))
              <p class="error_list">{{$errors->first('recipe_file')}}</p>
          @endif
          <div class="preview_img">
            <img id="preview">
          </div>
        </div>
        <div class="recipe_material">
          <table>
            <thead>
              <tr class="title">
                <th>材料</th>
                <th>数量</th>
              </tr>
            </thead>
            <tbody class="material_name">
              @foreach($post_items as $post_item)
              <tr>
                <td><input type="text" name="text_1[]" class="text" value="{{$post_item->name}}"></td>
                <td><input type="text" name="text_2[]" class="text" value="{{$post_item->qty}}"></td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="title">
                <td><button id="add" type="button">行を追加</button></td>
                <td><button id="del" type="button">削除</button></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="recipe_genre">
          <div>
            @if ($errors->has('genre'))
                <p class="error_list">{{$errors->first('genre')}}</p>
            @endif
            <select name="genre">
              <option <?php if(!empty($post_item->genre)) {?>value="{{ $post_item->genre }}"<?php } ?>><?php if(!empty($post_item->genre)) {?>{{ $post_item->genre }}<?php } ?></option>
              <option value="メイン">メイン</option>
              <option value="副菜">副菜</option>
              <option value="主食">主食</option>
              <option value="汁物">汁物</option>
            </select>
          </div>
        </div>
        <div class="recipe_process">
          @if ($errors->has('process'))
              <p class="error_list">{{$errors->first('process')}}</p>
          @endif
          <div class="process_box">
            <textarea name="process"><?php if(!empty($post_item->genre)) {?>{{ $post_item->process }}<?php } ?></textarea>
          </div>
        </div>
        <div class="recipe_btn">
          <input type="submit" value="送信">
        </div>
      </form>
    </div>
  </section>
  <footer>
    @include('recipes.footer')
  </footer>
</body>
<script type="text/javascript">
function msg_conf(){
  if(window.confirm('この内容で投稿しますか？')){
    return true;
  }else{
    return false;
  }
}
$(function(){
  $('button#add').click(function(){
    var tr_form = '' +
  '<tr>' +
    '<td><input type="text" name="text_1[]" class="text_add"></td>' +
    '<td><input type="text" name="text_2[]" class="text_add"></td>' +
  '</tr>';

  $(tr_form).appendTo($('table > tbody'));

  });
});

document.querySelector('#del').addEventListener('click', () =>{
  $('.text_add').remove();
});

function previewFile(hoge){
   var fileData = new FileReader();
   fileData.onload = (function() {
     //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
     //プレビュー表示している
     document.getElementById('preview').src = fileData.result;
   });
   fileData.readAsDataURL(hoge.files[0]);
 }
</script>
