<?php
// ダイレクトアクセスのチェック
$referer = $_SERVER['HTTP_REFERER']; //アクセス元ページ（ユーザー側）
$url = "confirm.php"; //運営が指定しているアクセス元ページ
if (!strstr($referer, $url)) {
    header("Location: contact.php");
    exit;
}

// (1) 登録するデータを用意
$name = $_POST['name'];
$kana = $_POST['kana'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$body = $_POST['body'];

try {
    // (2) データベースに接続
    $dsn = 'mysql:dbname=casteria;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // (3) トランザクション開始
    $pdo->beginTransaction();

    // (4) SQL作成
    $stmt = $pdo->prepare("INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)");

    // (5) 登録するデータをセット
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':kana', $kana, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':body', $body, PDO::PARAM_STR);

    // (6) SQL実行
    $res = $stmt->execute();

    // (7) コミット
    if ($res) {
        $pdo->commit();
    }
} catch (PDOException $e) {

    // (8) エラーメッセージを出力
    echo $e->getMessage();

    // (9) ロールバック
    $pdo->rollBack();
} finally {

    // (10) データベースの接続解除
    $pdo = null;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria | お問い合わせ</title>
    <link rel="stylesheet" type="text/css" href="../public/css/base.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../public/js/index.js"></script>
</head>

<body>
    <div class="main">
        <div class="container-fruid">
            <?php include("header.php") ?>
            <div class="row">
                <div class="col-md-12 col-xs-12 px-0">
                    <div class="complete_text">
                        <p>お問い合わせ内容を送信しました。<br>
                            ありがとうございました。</p>
                        <a href="index.php">トップへ</a>
                    </div>
                </div>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>