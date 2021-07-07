<?php
session_start();
include("functions.php");
// var_dump("おめでとうございますHOMEです");
// exit();
$pdo = connect_to_db();

//booksテーブルからのデータ呼び出し
$sql = "SELECT * FROM books WHERE is_deleted = 0 ORDER BY updated_at DESC";
// $sql = "SELECT * FROM books  INNER JOIN photo_table ON users_table.id = photo_table.contributor_id ORDER BY come_updated_at DESC";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// var_dump($status);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // exit();
}


// ここからは検索フォームのコード
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $search_value = $search;
} else {
    $search = '';
    $search_value = '';
}

$pdo2 = connect_to_db();
// $sql2 = "SELECT * FROM books WHERE is_deleted = 0, name , authorLIKE '%$search%'";
$sql2 = "SELECT * FROM books WHERE name LIKE '%$search%' OR  author LIKE '%$search%' AND is_deleted = 0";
$stmt2 = $pdo2->prepare($sql2);
$status2 = $stmt2->execute();


if ($status2 == false) {
    $error2 = $stmt2->errorInfo();
    echo json_encode(["error_msg" => "{$error2[2]}"]);
    exit();
} else {
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result2);
    // exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/7-2-1/css/7-2-1.css">
    <link rel="stylesheet" href="./css/home.css">
    <title>HOME</title>

</head>

<body>

    <div class="wrapper">
        <div id="search-wrap">
            <form class="header" action="" method="get" crole="search">
                <div class="bars"><img src="./image/bars-solid.svg" alt="" width="30px"></div>
                <div class="abe"><img src="./image/202106211415554ccca1ff03bf4ebc3acb2275ba01d593.png" width="80px" alt=""></div>
                <input type="text" name="search" id="search-text" value="<?php echo $search_value ?>">
                <i class="fa fa-search"></i>
                <input type="submit" value="" name="">
            </form>
        </div>


        <div class="main_body">
            <!-- 検索結果をここにカードタイプで吐き出す -->
            <div class="container">
                <div class="row" id="output2"></div>
            </div>

            <footer>
                <div class="footer_wrapper">
                    <button id="page_top" class="footer_btn_left" onclick="location.href='post_read.php'"></button>
                    <button class="button" type=“button” class="footer_btn_center" onclick="location.href='register/bookRegister_read.php?id= <?= $_SESSION['id'] ?>'"><img src="./image/plus-solid.svg" width="30px" alt=""></button>
                    <button id="reload" class="footer_btn_right"></button>
                </div>
            </footer>

            <!-- <div class="users"><img class="icon" src="<?= $_SESSION["usericon"] ?>"><?= $_SESSION["username"] ?></div>
            <button class="button" type=“button” onclick="location.href='genre.php?id= <?= $_SESSION['id'] ?>'">ジャンルで検索</button>
            <button class="button" type=“button” onclick="location.href='register/bookRegister_read.php?id= <?= $_SESSION['id'] ?>'">本を登録</button>
            <button class="button" type=“button” onclick="location.href='users_edit.php?id= <?= $_SESSION['id'] ?>'">プロフィール</button>
            <button class="button" type=“button” onclick="location.href='users_logout.php'">ログアウト</button> -->

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            //検索結果の表示 カード型の挿入HTMLここから
            const data2 = <?= json_encode($result2) ?>;
            const output_data2 = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
            data2.forEach(function(x) {
                output_data2.push(`
        <div class="col-sm-3 my-3">
        <form action="/LAB5/RiverSideHostel/book_details.php" method="get">
        <button type="submit" class="card" style="color: black; " >
            <img src="${x.image}" class="card-img-top" alt="...">
            <div class="card-body" style="max-width: 150px;">
            <h1 class="card-title" id="name">${x.name}</h1>
            <h2 class="card-title" id="name">${x.author}</h2>
            <h3 class="card-title" id="name">¥${x.price}</h3>
            </div>
            <div>
            <input name="id" type="hidden" value="${x.id}">
            </div>
        </button>
        </form>
        </div>
        `)
            });
            $("#output2").html(output_data2);
            //カード型の挿入HTMLここまで
        </script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>



</html>