<?php
// session_start();
include("functions.php");
// check_session_id();
var_dump($_POST);
exit();

if (
    !isset($_POST['search']) || $_POST['search'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}
$search = $_POST['search'];
$pdo = connect_to_db();
//SQL文を実行して、結果を$stmtに代入する。
$sql = "SELECT * FROM books WHERE Name LIKE  '%" . $_POST["search"] . "%')";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    exit();
}

?>

