<?php
include("../functions.php");
session_start();
$pdo = connect_to_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Register.css">
  <!-- マテリアルアイコン -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

  <title>本を登録する画面</title>
</head>

<body>

  <div class="header">

    <div class="header_left">
      <img class="header_btn" src="../image/close_white_18dp.svg" alt="" onclick="location.href='../users_logout.php'">
    </div>
    <div class="header_center">
      <p class="header_text">本の詳細情報</p>
    </div>
    <div class="header_right"></div>

  </div>



  <form action="bookRegister_creat.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <div class="record">
        <div class="formbook">

          <div class="img">
            <p class="category">本の画像</p>
            <label for="file" class="file_area">
              <img class="file_btn" src="../image/images-regular.svg" alt="">
            </label>
            <input type="file" id="file" class="fileinput" name="image" accept="image/*" capture="camera">
            <div id="preview"></div>

          </div>

          <div class="info">
            <p class="category">本の詳細</p>
            <input type="text" name="name" placeholder="本の名前"></input>
            <input type="text" name="author" placeholder="著者名"></input>
            <div class="genre_area">
              <select class="genre" name="genre" id="">
                <option value="写真集">写真集</option>
                <option value="画集">画集</option>
                <option value="映画">映画</option>
                <option value="ビジネス">ビジネス</option>
                <option value="IT・コンピュータ">IT・コンピュータ</option>
              </select>
              <div class="select_btn">
                <img src="../image/chevron-down-solid.svg" width="10px" alt="">
              </div>
            </div>
            <input type="month" name="published"></input>
            <textarea name="description" rows="10" cols="20" placeholder="商品の説明(任意 1,000文字以内)&#13;(本の内容、ページ数、言語、注意点など)&#13;&#13;写真がメインのデザイン集です。&#13;比較的スタンダードなものが多く参考にしやすいです。"></textarea>
          </div>

          <!-- まだまだジャンルの選択肢は沢山用意する予定！ -->
          <div class="price">
            <p class="category">1週間あたりの価格</p>
            <input type="number" name="price" placeholder="¥" min="0" max="1000000" />
            <p class="profit">貸出利益</p>
          </div>

          <button class="btn">本を登録する</button>
        </div>
      </div>
    </fieldset>
  </form>




  <script src="../Register.js"></script>

  <!-- これより下は元のデータのままです -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../kasho.js"></script> -->
  <!-- リロード処理 -->
  <script>
    $('#reload').on('click', () => {
      location.reload();
    });
  </script>

  <!-- トップへ戻る -->
  <script>
    $('#page_top').click(function() {
      $('body,html').animate({
        scrollTop: 0 //ページトップまでスクロール
      }, 500); //ページトップスクロールの速さ。数字が大きいほど遅くなる
      return false; //リンク自体の無効化
    });
  </script>

</body>

</html>