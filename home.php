<?php
// session_start();
include("functions.php");
// check_session_id();
// var_dump("おめでとうございますHOMEです");
// exit();
$pdo = connect_to_db();

//booksテーブルからのデータ呼び出し
$sql = "SELECT * FROM books WHERE is_deleted = 0 ORDER BY updated_at DESC";
// $sql = "SELECT * FROM books  INNER JOIN photo_table ON users_table.id = photo_table.contributor_id ORDER BY come_updated_at DESC";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href= /> 使ってないcss-->
    <title>HOME</title>

</head>

<body>
    <div class="head">
        <div>
            <h1>Home</h1>
        </div>
        <div class="users"><img class="icon" src="<?= $_SESSION["usericon"] ?>"><?= $_SESSION["username"] ?></div>
        <button class="button" type=“button” onclick="location.href='register/bookRegister_read.php?id= <?= $_SESSION['id'] ?>'">本を登録する</button>
        <button class="button" type=“button” onclick="location.href='users_edit.php?id= <?= $_SESSION['id'] ?>'">プロフィール</button>
        <button class="button" type=“button” onclick="location.href='users_logout.php'">ログアウト</button>
    </div>
    <div class="main_body">
        <!-- 検索蘭 -->


        <!-- カードタイプで画像ファイルを表示させるためのコード -->
        <div class="container">
            <!-- ここにカード一式が順次吐き出されてくる -->
            <div class="row" id="output"></div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            //カード型の挿入HTMLここから
            const data = <?= json_encode($result) ?>;
            const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
            data.forEach(function(x) {
                output_data.push(`
        <div class="col-sm-3 my-3">
        <div class="card" style="color: black;">
            <img src=${x.image} class="card-img-top" alt="...">
            <div class="card-body" style="max-width: 150px;">
            <h5 class="card-title" id="name">${x.name}</h5>
            <h5 class="card-title" id="name">${x.author}</h5>
            <h5 class="card-title" id="name">${x.price}</h5>
            </div>
            <div class="border-bottom p-2 d-grid gap-2 d-md-flex justify-content-sm-end">
            <p hidden>${x.id}</p>
            </div>
        </div>
        </div>
        `)
            });
            $("#output").html(output_data);
            //カード型の挿入HTMLここまで
        </script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>



</html>