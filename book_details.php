<?php

use function PHPSTORM_META\exitPoint;

include("functions.php");
session_start();

$id = $_GET["id"];
// var_dump($id);
// exit('ok');
// var_dump("止まれ");
// exit();
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
        $output .= "<td><img src='image/{$record["image"]}'></td><br>";
        $output .= "<td>{$record["name"]}</td><br>";
        $output .= "<td>{$record["author"]}</td><br>";
        $output .= "<td>{$record["published"]}</td><br>";
        $output .= "<td>{$record["genre"]}</td><br>";
        $output .= "<td>¥{$record["price"]}</td><br>";
        $output .= "<td><p>- 貸出可能です -</p></td><br>";
        $output .= "<td>{$record["description"]}</td><br>";
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
    <title>本の詳細画面 & 取引画面</title>
</head>

<body>

    <button class="button" type=“button” onclick="location.href='home.php'">HOME</button>


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



</body>


</html>