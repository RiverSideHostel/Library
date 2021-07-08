<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/kasho.css"> -->
  <link rel="stylesheet" href="./css/login.css">

  <title>ii tanaログイン画面</title>
</head>

<body>

  <!-- 大きい箱　幅をCssで指定 -->

  <section class="form_parent">


    <h1>ii tanaにログイン</h1>


    <!-- ログイン -->
    <form class="form_parent" action="users_login_act.php" method="post">


      <div>
        <div class="form_group">
          <p class="item_label">ニックネーム</p>
        </div>
        <input type="text" class="login_username" name="name" style="background-color: transparent;">
      </div>
      <div>
        <div class="form_group">
          <p class="item_label">パスワード</p>
        </div>
        <input type="password" class="login_password" name="password" style="background-color: transparent;">
      </div>

      <div>
        <button class="login_btn" style="background-color: transparent;">ログイン</button>
      </div>

    </form>

    <!-- 新規会員登録 -->

    <div class="person_box">
      <p class="person_text">アカウントをお持ちでない方</p>
      <button class="new_btn" style="background-color: transparent;" onclick="location.href='index.html'">新規会員登録</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>