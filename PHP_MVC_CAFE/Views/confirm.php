<?php
require_once('../Controllers/ContactsController.php');

// ダイレクトアクセスがあった場合、お問い合わせページヘリダイレクトする
$referer = $_SERVER['HTTP_REFERER']; //アクセス元ページ（ユーザー側）
$url = "contact.php"; //運営が指定しているアクセス元ページ
if (!strstr($referer, $url)) {
    header("Location: contact.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria | お問い合わせ内容のご確認</title>
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
                    <form id="form" class="form" name="form" action="complete.php" method="post">
                        <input type="hidden" name="name" value="<?= h($_POST['name']) ?>">
                        <input type="hidden" name="kana" value="<?= h($_POST['kana']) ?>">
                        <input type="hidden" name="tel" value="<?= h($_POST['tel']) ?>">
                        <input type="hidden" name="email" value="<?= h($_POST['email']) ?>">
                        <input type="hidden" name="body" value="<?= h($_POST['body']) ?>">
                        <p>
                            <label for="name">
                                お名前
                                <span class="required">必須</span>
                                <span class="error">
                                    <?php
                                    if (empty(h($_POST['name']))) {
                                        echo 'お名前が空白です';
                                    } elseif (mb_strlen(h($_POST['name'])) > 10) {
                                        echo '10文字以内で入力してください';
                                    }
                                    ?>
                                </span>
                            </label><br>
                            <?= h($_POST['name']) ?>
                        </p>
                        <p>
                            <label for="kana">
                                フリガナ
                                <span class="required">必須</span>
                                <span class="error">
                                    <?php
                                    if (empty(h($_POST['kana']))) {
                                        echo 'フリガナが空白です';
                                    } elseif (mb_strlen(h($_POST['kana'])) > 10) {
                                        echo '10文字以内で入力してください';
                                    }
                                    ?>
                                </span>
                            </label><br>
                            <?= h($_POST['kana']) ?>
                        </p>
                        <p>
                            <label for="tel">
                                電話番号
                                <span class="error">
                                    <?php
                                    if (empty(h($_POST['tel']))) {
                                        echo '';
                                    } elseif (!preg_match('/^[0-9]+$/', h($_POST['tel']))) {
                                        echo '正しい電話番号を入力してください';
                                    }
                                    ?>
                                </span>
                            </label><br>
                            <?= h($_POST['tel']) ?>
                        </p>
                        <p>
                            <label for="email">
                                メールアドレス
                                <span class="required">必須</span>
                                <span class="error">
                                    <?php
                                    if (empty(h($_POST['email']))) {
                                        echo 'メールアドレスが空白です';
                                    } elseif (!filter_var((h($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
                                        echo '正しいメールアドレスを入力してください';
                                    }
                                    ?>
                                </span>
                            </label><br>
                            <?= h($_POST['email']) ?>
                        </p>
                        <p>
                            <label for="body">
                                お問い合わせ内容
                                <span class="required">必須</span>
                                <span class="error">
                                    <?php
                                    if (empty(h($_POST['body']))) {
                                        echo 'お問い合わせ内容が空白です';
                                    }
                                    ?>
                                </span>
                            </label><br>
                            <?= nl2br(h($_POST['body'])) ?>
                        </p>
                        <p id="confirm">
                            <input class="back" type="button" value="キャンセル" onClick="history.back()">
                            <input class="submit" type="submit" name="submit" value="送信する">
                        </p>
                    </form>
                </div>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>