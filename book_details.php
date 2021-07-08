<?php

use function PHPSTORM_META\exitPoint;

include("functions.php");
session_start();
// check_session_id();

$id = $_GET["id"];
// var_dump($id);
// exit('ok');

$pdo = connect_to_db();
$sql = 'SELECT * FROM books WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<div class='author_area'><td>{$record["author"]}</td></div>";
        $output .= "<div class='name_area'><td>{$record["name"]}</td></div>";
        $output .= "<div class='book_img_area'><td><img class='book_img' src='image/{$record["image"]}'></td></div>";
        $output .= "<td>{$record["published"]}</td>";
        $output .= "<td>{$record["genre"]}</td>";
        $output .= "<td>¥{$record["price"]}</td>";
        $output .= "<td><p>- 貸出可能です -</p></td>";
        $output .= "<td>{$record["description"]}</td>";

        // $output .= "<td>{$id}</td>";
        $output .= "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/details.css">
    <title>本の詳細画面 & 取引画面</title>


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


</head>

<body>
    <!--------------ヘッダーーーーーーーーーーーーーー-->

    <div class="header">

        <div class="header_left">
            <img class="header_btn_left" src="./image/chevron-left-solid.svg" width="25px" alt="" onclick="location.href='home.php'">
        </div>
        <div class="header_center">
            <img class="header_btn_center" src="./image/iitana_rogo.svg" width="40px" alt="" onclick="location.href='home.php'">
        </div>
        <div class="header_right"></div>

    </div>

    <!--------------ヘッダーーーーーーーーーーーーーー-->



    <!--------------メインーーーーーーーーーーーーー-->

    <div class="warapper">
        <!-- ここに本の情報が入り込んでくる -->
        <div class=" container">
            <tbody>
                <?= $output ?>
            </tbody>
        </div>
        <form action='bookBorrow_creat.php' method="post">
            <label for="trade">トレードタイプを選択してください</label>
            <select name="trade_type" id="trade">
                <option value="郵送">郵送</option>
                <option value="コンビニ">コンビニ</option>
            </select>
            <label for="date">受取日</label>
            <input type="date" name="receipt_date" id="date">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="この本を借りる">
        </form>
        <button class="button" type=“button” onclick="location.href='home.php'">同じ本を貸しに出す</button>

        <!--------------メインーーーーーーーーーーーーー-->

        <!-- ------------ヘッダーーーーーーーーーーーーー -->

        <footer>
            <div class="footer_wrapper">
                <div class="footer_btn_left" onclick="location.href='post_read.php'"><img src="./image/shopping_cart_black_24dp.svg" width="30px" alt=""></div>
                <div class="footer_btn_center" onclick="location.href='bookRegister_read.php?id= <?= $_SESSION['id'] ?>'"><img src="./image/plus-solid.svg" width="30px" alt=""></div>
                <div class="footer_btn_right"><img src="./image/user-circle-solid.svg" width="30px" alt=""></div>
            </div>
        </footer>
    </div>

    <!-- ------------ヘッダーーーーーーーーーーーーー -->
</body>


</html>