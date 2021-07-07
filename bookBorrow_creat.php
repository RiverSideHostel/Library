<?php

use function PHPSTORM_META\exitPoint;

session_start();
// var_dump($_SESSION['ID']);
// var_dump($_SESSION['NAME']);
// exit('ok');
include("functions.php");

$id = $_GET["id"];
$trade_type = $_GET["trade_type"];
$receipt_date = $_GET["receipt_date"];
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
    header('Location:/LAB5/RiverSideHostel/bookBorrow_result.php/');
    exit();
}
