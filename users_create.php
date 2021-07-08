<?php
include('functions.php');
$pdo = connect_to_db();

if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
  // !isset($_POST['address']) || $_POST['address'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];

$sql = 'INSERT INTO users_table(id, name, email, password, address, is_admin, is_deleted, created_at, updated_at) 
VALUES(NULL, :name, :email, :password,:address, 0, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:users_login.php");
  exit();
}
