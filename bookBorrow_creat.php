<?php

use function PHPSTORM_META\exitPoint;

session_start();
include("functions.php");
// check_session_id();


//入力されてないと弾くやつ
if (
    !isset($_POST['trade_type']) || $_POST['trade_type'] == '' ||
    !isset($_POST['receipt_date']) || $_POST['receipt_date'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$id = $_POST["id"];
$trade_type = $_POST["trade_type"];
$receipt_date = $_POST["receipt_date"];
$return_date = date('Y-m-d', strtotime("$receipt_date  +1 week"));
$pdo = connect_to_db();

$sql = "UPDATE books SET status = 1 , borrow_user_id=:borrow_user_id, trade_type=:trade_type, receipt_date=:receipt_date, return_date=:return_date, updated_at = sysdate() WHERE id=:id";
// $sql = "INSERT INTO books(id, name, author, published, price, genre, description, image, status, user_id, borrow_user_id, trade_type, place_name, receipt_date, return_date, is_deleted, created_at, updated_at) 
// VALUES (NULL, :name, :author, :published, :price, :genre, :description, :image,0,10, NULL, NULL, NULL, NULL, NULL,0,sysdate(),sysdate())";
// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':borrow_user_id', $_SESSION['ID'], PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':trade_type', $trade_type, PDO::PARAM_STR);
$stmt->bindValue(':receipt_date', $receipt_date, PDO::PARAM_STR);
$stmt->bindValue(':return_date', $return_date, PDO::PARAM_STR);
$status = $stmt->execute();

// var_dump($status);
// exit();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // URL末尾に$isをつけてGETメソッドで送りつける！！！！ありがとう比嘉さん！！！
    header('Location:bookBorrow_result.php' . '?id=' . $id);
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>取引の確認画面へ</title>
</head>

<body>
    <form action="bookBorrow_result.php" method="get">
        <button class="button" type=“submit” name="id" value="<?= $id ?>">取引の確認画面へ</button>
    </form>

</body>

</html>