<?php
session_start();
include("functions.php");
// check_session_id();


$pdo = connect_to_db();

//booksテーブルからのデータ呼び出し
$sql = "SELECT * FROM books WHERE is_deleted = 0 ORDER BY updated_at DESC";

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


    <!-- フォント用 -->
    <script>
        (function(d) {
            var config = {
                    kitId: 'vsf2cfy',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <!-- フォント用 -->



    <title>HOME</title>

</head>

<body>

    <div class="wrapper">
        <div id="search-wrap">
            <form class="header" action="" method="get" crole="search">
                <div class="bars"><img src="./image/bars-solid.svg" alt="" width="30px"></div>
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
                    <button id="page_top" class="footer_btn_left" onclick="location.href='post_read.php'"><img src="./image/shopping_cart_black_24dp.svg" width="30px" alt=""></button>
                    <button class="button" type=“button” class="footer_btn_center" onclick="location.href='bookRegister_read.php?id= <?= $_SESSION['id'] ?>'"><img src="./image/plus-solid.svg" width="30px" alt=""></button>
                    <button id="reload" class="footer_btn_right"><img src="./image/user-circle-solid.svg" width="30px" alt=""></button>
                </div>
            </footer>


        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            //検索結果の表示 カード型の挿入HTMLここから
            const data2 = <?= json_encode($result2) ?>;
            const output_data2 = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
            data2.forEach(function(x) {
                output_data2.push(`
        <div class="col-sm-3 my-3">
        <form action="book_details.php" method="get">
        <button type="submit" class="card" style="color: white; " >
            <img src="${x.image}" class="card-img-top" alt="...">

            <div class="card-body" style="max-width: 180px;">

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
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->


</body>



</html>