<?php
// session_start();
include("functions.php");
// check_session_id();

// $id = $_GET["id"];

$pdo = connect_to_db();

//テーマテーブルからのデータ呼び出し
$sql = "SELECT * FROM thema_table ";
$stmt = $pdo->prepare($sql);
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
        $output .= "<td>{$record["imgthema"]}</td>";
        $output .= "<td><a href='themaphoto_upform.php?thema_id={$record["thema_id"]}'><img src={$record["thema_icon"]} height ='150px' ></td>";
        $output .= "</tr>";
    }
    unset($value);
}


//ユーザーテーブルからのデータ呼び出し
$sql2 = "SELECT * FROM users_table WHERE id=:id";

$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':id', $id, PDO::PARAM_INT);
$status2 = $stmt2->execute();

if ($status2 == false) {
    $error = $stmt2->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $output2 = "";
    foreach ($result2 as $record) {
        $output2 .= "<tr>";
        $output2 .= "<td>{$record["username"]}</td>";
        $output2 .= "<td><a href='profile_edit.php?id={$record["id"]}'>edit</a></td>";
        $output2 .= "<td><a href='profile_delete.php?id={$record["id"]}'>delete</a></td>";
        $output2 .= "<td><img src={$record["usericon"]} height ='150px' ></td>";
        $output2 .= "</tr>";
    }
    unset($value);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
    <div class="head">
        <div>
            <h1>Photo Life</h1>
        </div>
        <div class="users"><img class="icon" src="<?= $_SESSION["usericon"] ?>"><?= $_SESSION["username"] ?></div>
        <button class="button" type=“button” onclick="location.href='thema_request.php?id= <?= $_SESSION['id'] ?>'">テーマを投稿する</button>
        <button class="button" type=“button” onclick="location.href='profile_edit.php?id= <?= $_SESSION['id'] ?>'">プロフィール編集</button>
        <button class="button" type=“button” onclick="location.href='logout.php'">LOGOUT</button>
    </div>
    <div class="main_body">
        <!-- テーマを一覧できるゾーン -->
        <table>
            <tbody><?= $output ?></tbody>
        </table>

    </div>
    <script src="button.js"></script>
    <script>
        const hoge = <?= json_encode($output) ?>;
        const hoge2 = <?= json_encode($output2) ?>;
        console.log(hoge);
        console.log(hoge2);
    </script>

    <!-- カードタイプで画像ファイルを表示させるためのコード -->
    <div class="container">
        <h3 class="py-3 text-nowrap" style="color:#24A6E9;">LAB5の最近の出来事（一覧画面）</h3>
        <div class="row" id="output">
        </div>
        <a href="website_form_input.php" class="btn btn-secondary mb-3" role="button">登録画面</a>
    </div>
    <!-- jpuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        const data = <?= json_encode($result2) ?>;
        const output_data = [];
        data.forEach(function(x) {
            output_data.push(`
      <div class="col-sm-3 my-3">
        <img src=${x.usericon} class="card-img-top" alt="...">
        <div class="card" style="background-color: #24A6E9; color: white;">
          <img src=${x.posted_at} class="card-img-top" alt="...">
          <div class="card-body" style="min-height: 180px;">
            <h5 class="card-title" id="name">${x.username}</h5>
            <p class="card-text" id="event">${x.posted_coment}</p>
          </div>
            <div class="border-bottom p-2 d-grid gap-2 d-md-flex justify-content-sm-end">
              <button class="${x.id} btn btn-light btn-sm rounded-pill" onclick="location.href='website_form_edit.php?id=${x.id}'" type="button" style="color:#24A6E9; font-weight:bold;">編集</button>
              <button class="btn btn-light btn-sm rounded-pill delete" type="button" style="color:#24A6E9; font-weight:bold;">削除</button>
              <p hidden>${x.id}</p>
            </div>
          <div class="card-body">
            <p class="card-title" id="writer">${x.writer}</p>
            <p class="card-text" id="email">${x.email}</p>
          </div>
        </div>
      </div>
      `)
        });
        $("#output").html(output_data);
        // 削除クリックしてアラートで確認
        $(".delete").on("click", function() {
            let checkDeleteFlg = window.confirm("削除しますか？");
            if (checkDeleteFlg) {
                const id_num = $(this).next("p").html();
                location.href = `website_form_delete.php?id=${id_num}`;
                alert("削除を実行しました。");
            } else {
                alert("削除をキャンセルしました。");
            }
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
<!-- profile -->


</html>