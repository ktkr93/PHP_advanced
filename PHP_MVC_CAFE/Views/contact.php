<?php
require_once('../Controllers/ContactsController.php');

// idのデータがPOSTされた場合の処理
if (!empty($_POST['id'])) {
    // DBの該当行を削除
    $controller->deleteData(h($_POST['id']));
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria | お問い合わせ</title>
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
                    <form id="form" class="form" name="form" action="confirm.php" method="post">
                        <p>
                            <label for="name">お名前<span class="required">必須</span></label><br>
                            <input type="text" name="name" id="name" placeholder="鈴木太郎">
                        </p>
                        <p>
                            <label for="kana">フリガナ<span class="required">必須</span></label><br>
                            <input type="text" name="kana" id="kana" placeholder="スズキタロウ">
                        </p>
                        <p>
                            <label for="tel">電話番号</label><br>
                            <input type="text" name="tel" id="tel" placeholder="07012345678">
                        </p>
                        <p>
                            <label for="email">メールアドレス<span class="required">必須</span></label><br>
                            <input type="text" name="email" id="email" placeholder="suzuki.taro@casteria.test">
                        </p>
                        <p>
                            <label for="body">お問い合わせ内容<span class="required">必須</span></label>
                            <textarea name="body" id="body"></textarea>
                        </p>
                        <p id="confirm">
                            <input type="submit" class="confirm" name="confirm" value="確認画面へ" onClick="return check();">
                        </p>
                    </form>


                    <table class="tableDisplay">
                        <tbody>
                            <tr class="tableHeader">
                                <th>お名前</th>
                                <th>フリガナ</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                                <th>お問い合わせ内容</th>
                            </tr>
                            <?php
                            $rows = $controller->allData();
                            ?>
                            <?php foreach ($rows as $row) : ?>
                                <form id="form" action="contact.php" method="post">
                                    <tr>
                                        <th><?= $row->name ?></th>
                                        <th><?= $row->kana ?></th>
                                        <th><?= $row->tel ?></th>
                                        <th><?= $row->email ?></th>
                                        <th><?= nl2br($row->body) ?></th>
                                        <th><a href="edit.php?id=<?= $row->id ?>">編集</th>
                                        <th>
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <input type="submit" id="btn_delete" class="btn_delete" name="btn_delete" value="削除" onClick="return confirm('本当に削除しますか？')">
                                        </th>
                                    </tr>
                                </form>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>