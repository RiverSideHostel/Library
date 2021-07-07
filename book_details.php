<?php
include("functions.php");
// session_start();
// check_session_id();
$id = $_GET["id"];
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
        $output .= "<td><p>貸出できます</p></td><br>";
        $output .= "<td>{$record["description"]}</td>";
        $output .= "</tr>";
        //     var_dump($result);
        // exit();
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本の詳細画面</title>
</head>

<body>
    <button class="button" type=“button” onclick="location.href='home.php'">借りる</button>
    <button class="button" type=“button” onclick="location.href='home.php'">同じ本を貸しに出す</button>
    <button class="button" type=“button” onclick="location.href='home.php'">HOME</button>
    <div class=" container">
        <tbody>
            <!-- ↓に<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output ?>
        </tbody>

        <!-- <div class="row" id="output"></div> -->
    </div>




    <script>
        //ホーム画面のカード型の挿入HTMLここから
        // const data = <?= json_encode($result) ?>;
        // const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        // data.forEach(function(x) {
        //     output_data.push(`
        // <div class="col-sm-3 my-3">
        // <div class="card" style="color: black;">
        //     <img src="image/${x.image}" class="card-img-top" alt="...">
        //     <div class="card-body" style="max-width: 150px;">
        //     <h5 class="card-title" id="name">${x.name}</h5>
        //     <h5 class="card-title" id="name">${x.author}</h5>
        //     <h5 class="card-title" id="name">${x.published}</h5>
        //     <h5 class="card-title" id="name">${x.genre}</h5>
        //     <h5 class="card-title" id="name">${x.price}</h5>
        //     <h5 class="card-title" id="name">${x.status}</h5>
        //     </div>
        //     <div class="border-bottom p-2 d-grid gap-2 d-md-flex justify-content-sm-end">
        //     <p hidden>${x.id}</p>
        //     </div>
        // </div>
        // </div>
        // `)
        // });
        // console.log(output_data);
        // $("#output").html(output_data);
        //カード型の挿入HTMLここまで
    </script>
</body>


</html>