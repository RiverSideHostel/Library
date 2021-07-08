<?php

session_start();
include('functions.php');

$pdo = connect_to_db();
// var_dump($_POST);
// exit;

$name = $_POST['name'];
$password = $_POST['password'];
// var_dump($name);
// var_dump($password);
// exit;

$sql = 'SELECT * FROM users_table
                WHERE name = :name
                AND   password = :password
                AND   is_deleted = 0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

$val = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($val);
// exit;

if (!$val) {
    echo ('ログイン情報に誤りがあります');
    echo ('<a href="todo_login.php">login</a>');
    exit();
} else {
    $_SESSION['ID'] = $val['id'];
    $_SESSION['NAME'] = $val['name'];

    header("Location:home.php");
    exit();
}
