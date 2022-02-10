<?php
require_once('../Controllers/ContactsController.php');

// ダイレクトアクセスがあった場合、お問い合わせページヘリダイレクトする
$referer = $_SERVER['HTTP_REFERER']; //アクセス元ページ（ユーザー側）
$url = "confirm.php"; //運営が指定しているアクセス元ページ
if (!strstr($referer, $url)) {
    header("Location: contact.php");
    exit;
}

// 登録するデータを用意
$name = h($_POST['name']);
$kana = h($_POST['kana']);
$tel = h($_POST['tel']);
$email = h($_POST['email']);
$body = h($_POST['body']);
// DBに登録
$itemPost->createData($name, $kana, $tel, $email, $body);

echo 'アクセス先：' . ROOT_PATH . 'Views' . $parse['path'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria | お問い合わせが完了しました</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
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