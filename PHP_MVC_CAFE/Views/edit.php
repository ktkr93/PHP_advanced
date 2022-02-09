<?php
require_once('../Controllers/Connect.php');
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
                    <form id="form" class="form" name="form" action="edit.php" method="post">
                        <?php
                        // GETパラメータの$idがあり、POSTデータがない場合、データを表示する
                        if (!empty($_GET['id']) && empty($_POST['id'])) {
                            $data = $itemPost->editData($_GET['id']);
                        }
                        // POSTがある場合（入力されたデータが送信された場合）
                        elseif (!empty($_POST)) {
                            // 登録するデータを用意
                            $id = h($_POST['id']);
                            $name = h($_POST['name']);
                            $kana = h($_POST['kana']);
                            $tel = h($_POST['tel']);
                            $email = h($_POST['email']);
                            $body = h($_POST['body']);
                            // DBを更新する
                            $itemPost->updateData($id, $name, $kana, $tel, $email, $body);
                        }
                        // GETパラメータの$idが空で、POSTデータがない場合、contact.phpにリダイレクト
                        // 不正アクセスの防止
                        elseif (empty($_GET['id'] && empty($_POST))) {
                            header("Location: contact.php");
                            exit;
                        }
                        ?>

                        <p>
                            <label for="name">お名前<span class="required">必須</span></label><br>
                            <input type="text" name="name" id="name" value="<?= $data['name'] ?>">
                        </p>
                        <p>
                            <label for="kana">フリガナ<span class="required">必須</span></label><br>
                            <input type="text" name="kana" id="kana" value="<?= $data['kana'] ?>">
                        </p>
                        <p>
                            <label for="tel">電話番号</label><br>
                            <input type="text" name="tel" id="tel" value="<?= $data['tel'] ?>">
                        </p>
                        <p>
                            <label for="email">メールアドレス<span class="required">必須</span></label><br>
                            <input type="text" name="email" id="email" value="<?= $data['email'] ?>">
                        </p>
                        <p>
                            <label for="body">お問い合わせ内容<span class="required">必須</span></label>
                            <textarea name="body" id="body"><?= $data['body'] ?></textarea>
                        </p>
                        <p id="confirm">
                            <a class="btn_cancel" href="contact.php">キャンセル</a>
                            <input type="submit" class="confirm" name="confirm" value="更新" onClick="return check();">
                        </p>
                        <input type="hidden" name="id" value="
                        <?php
                        if (!empty($data['id'])) {
                            echo $data['id'];
                        }
                        ?>">
                    </form>
                </div>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>