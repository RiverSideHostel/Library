<?php
session_start();
include("../functions.php");
// check_session_id();
// var_dump($_POST);
// exit();

if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['author']) || $_POST['author'] == '' ||
    // !isset($_POST['published']) || $_POST['published'] == '' ||  //出版だけフィルタあえてかけない
    !isset($_POST['price']) || $_POST['price'] == '' ||
    !isset($_POST['genre']) || $_POST['genre'] == '' ||
    !isset($_POST['description']) || $_POST['description'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$name = $_POST['name'];
$author = $_POST['author'];
$published = $_POST['published'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$description = $_POST['description'];
// $ = $_POST[''];
// var_dump($_POST['published']);
// exit();

// ここから画像ファイルアップロード&DB登録の処理を追加しよう！！！
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploaded_file_name = $_FILES['image']['name']; //ファイル名の取得 
    $temp_path = $_FILES['image']['tmp_name'];
    //tmpフォルダの場所 
    $directory_path = '../image/';
    // var_dump($uploaded_file_name);
    // exit();
}

// 拡張子の情報を取得
$extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
$unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
$filename_to_save = $directory_path . $unique_name;
// var_dump($filename_to_save);
// var_dump($extension);
// exit();

if (is_uploaded_file($temp_path)) {
    // ↓ここでtmpファイルを移動する
    if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644);
        // imgタグを設定
    } else {
        exit('Error:画像がアップロードできませんでした');
        // 画像の保存に失敗
    }
} else {
    exit('Error:画像がありません');
    // tmpフォルダにデータがない
}

$pdo = connect_to_db();
// var_dump($description);
// exit();
// $sql = 'INSERT INTO books(id, name, author, published, price, genre, description, image, status, user_id, borrow_user_id, trade_type, place_name, receipt_date, return_date, is_deleted, created_at, updated_at) VALUES(NULL, :name, :author,:published,:price, :genre, :description, :image, 0, NULL , NULL , NULL, NULL, NULL, NULL, 0, sysdate(), sysdate())';
// $sql = 'INSERT INTO books(id, name, author, published, price, genre, description, image, status, user_id, borrow_user_id, trade_type, place_name, receipt_date, return_date, is_deleted, created_at, updated_at) 
// VALUES(NULL, :name, :author,:published,:price, :genre, :description, :image, 0, NULL , 0 , NULL, NULL, NULL, NULL, 0, sysdate(), sysdate())';
// $sql = 'INSERT INTO books(id, name, author, published, price, genre, description, image, created_at, updated_at) 
// VALUES(NULL, :name, :author,:published,:price, :genre, :description, :image, sysdate(), sysdate())';
// $sql = 'INSERT INTO books(`id`, `name`, `author`, `published`, `price`, `genre`, `description`, `image`, `status`, `user_id`, `borrow_user_id`, `trade_type`, `place_name`, `receipt_date`, `return_date`, `is_deleted`, `created_at`, `updated_at`) 
// VALUES ('NULL','宮川','ホンマタカシ','2015-06','400','写真','これはすごい本です','20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg','0','2','4','コンビニ','NULL','NULL','NULL','0',sysdate(),sysdate())';
$sql = "INSERT INTO books(id, name, author, published, price, genre, description, image, status, user_id, borrow_user_id, trade_type, place_name, receipt_date, return_date, is_deleted, created_at, updated_at) 
VALUES (NULL, :name, :author, :published, :price, :genre, :description, :image,0,10, NULL, NULL, NULL, NULL, NULL,0,sysdate(),sysdate())";
// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':published', $published, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($status);
// exit();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header('Location:../home.php/');
    exit();
}
