<?php

use function PHPSTORM_META\exitPoint;

session_start();
include("functions.php");
// check_session_id();



$id = $_GET["id"];
// var_dump($id);
// var_dump($_SESSION);
// var_dump($_SESSION["book_id"]);
// exit("ok?");

$pdo = connect_to_db();
$sql = "SELECT * FROM books WHERE id=:id";
// $sql = "UPDATE books SET borrow_user_id=:borrow_user_id, trade_type=:trade_type, receipt_date=:receipt_date, return_date=:return_date, updated_at = sysdate() WHERE id=:id";
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
        $output .= "<td><img src='{$record["image"]}'></td><br>";
        $output .= "<td><p>- 商品概要 -</p></td><br>";
        $output .= "書名：<td>{$record["name"]}</td><br>";
        $output .= "著者：<td>{$record["author"]}</td><br>";
        $output .= "出版時期：<td>{$record["published"]}</td><br>";
        $output .= "ジャンル：<td>{$record["genre"]}</td><br>";
        $output .= "<td><p></p></td><br>";
        $output .= "<td><p>- 取引概要 -</p></td><br>";
        $output .= "<td>１週間貸出：¥{$record["price"]}</td><br>";
        $output .= "<td>引渡方法：{$record["trade_type"]}</td><br>";
        $output .= "<td>受取予定日：{$record["receipt_date"]}</td><br>";
        $output .= "<td>返却予定日：{$record["return_date"]}</td><br>";
        $output .= "<td>貸出人：{$_SESSION['NAME']}</td><br>";
        $output .= "</tr>";
    }
}
// header('Location:/LAB5/RiverSideHostel/home.php/');
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>取引内容の確認画面</title>
</head>

<body>
    <div class=" container">
        <tbody>
            <?= $output ?>
        </tbody>
    </div>

    <button class="button" type=“button” onclick="location.href='home.php'">取引完了してHOMEへ</button>

</body>

</html>