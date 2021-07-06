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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/read.css">
  <link rel="icon" href="../image/icon.png">

  <title>本を登録する画面</title>
</head>

<body>
  <form action="file_upload.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <div class="record">
        <div class="formbook">
          <label>Select Book <br>
            <input type="file" name="image" accept="image/*">
          </label>
        </div>
        <button class="btn">本を登録する</button>
      </div>
    </fieldset>
  </form>





  <!-- これより下は元のデータのままです -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../kasho.js"></script>
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