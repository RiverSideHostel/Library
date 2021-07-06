<?php
include("../functions.php");
// session_start();
// check_session_id();
$pdo = connect_to_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- マテリアルアイコン -->
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="../css/read.css"> -->
  <link rel="icon" href="../image/icon.png">

  <title>本を登録する画面</title>
</head>

<body>
  <form action="bookRegister_creat.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <div class="record">
        <div class="formbook">
          <label>本を登録する<br>
            <input type="text" name="name" placeholder="本の名前" />
            <input type="text" name="author" placeholder="著者名" />
            <!-- 本当は「年」だけの４桁入力にしたいが実装できてない状態です -->
            <input type="month" name="published" placeholder="出版時期" />
            <input type="number" name="price" placeholder="¥" min="0" max="1000000" />
            <input type="radio" name="genre" value="写真集">写真集
            <input type="radio" name="genre" value="画集">画集
            <input type="radio" name="genre" value="映画">映画
            <input type="radio" name="genre" value="ビジネス">ビジネス
            <input type="radio" name="genre" value="IT・コンピュータ">IT・コンピュータ
            <!-- まだまだジャンルの選択肢は沢山用意する予定！ -->
            <textarea name="description" rows="5" cols="20">ここに商品説明を記載してください</textarea>
            <input type="file" name="image" accept="image/*">
          </label>
        </div>
        <button class="btn">本を登録する</button>
      </div>
    </fieldset>
  </form>





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