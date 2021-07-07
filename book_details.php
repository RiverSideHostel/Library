<?php
include("functions.php");
// session_start();
// check_session_id();
$id = $_GET["id"];
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:id';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本の詳細画面</title>
</head>

<body>

    <div class=" container">
        <div class="row" id="output"></div>
    </div>
    <button class="button" type=“button” onclick="location.href='users_logout.php'">借りる</button>
    <button class="button" type=“button” onclick="location.href='users_logout.php'">同じ本を貸しに出す</button>



    <script>
        //URL末尾？移行をユーザーネームとして情報を吸い上げる処理
        // location.search.substring(1)は、URLから最初の4文字 ("?id="までの記号) を除いた文字列を取得する
        const id = location.search.substring(4);
        console.log(id);

        //ホーム画面のカード型の挿入HTMLここから
        const data = <?= json_encode($result) ?>;
        const output_data = []; //空の配列を作ってそこのプッシュでぽいぽいしてく
        data.forEach(function(x) {
            output_data.push(`
        <div class="col-sm-3 my-3">
        <div class="card" style="color: black;">
            <img src="image/${x.image}" class="card-img-top" alt="...">
            <div class="card-body" style="max-width: 150px;">
            <h5 class="card-title" id="name">${x.name}</h5>
            <h5 class="card-title" id="name">${x.author}</h5>
            <h5 class="card-title" id="name">${x.published}</h5>
            <h5 class="card-title" id="name">${x.genre}</h5>
            <h5 class="card-title" id="name">${x.price}</h5>
            <h5 class="card-title" id="name">${x.status}</h5>
            </div>
            <div class="border-bottom p-2 d-grid gap-2 d-md-flex justify-content-sm-end">
            <p hidden>${x.id}</p>
            </div>
        </div>
        </div>
        `)
        });
        console.log(output_data);
        $("#output").html(output_data);
        //カード型の挿入HTMLここまで
    </script>
</body>


</html>