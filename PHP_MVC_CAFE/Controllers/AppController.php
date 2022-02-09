<?php
// **CONTROLLERS


// データベースに接続
class Update
{
    const DB_NAME = 'casteria';
    const HOST    = '127.0.0.1';
    const UTF     = 'utf8';
    const USER    = 'root';
    const PASS    = '';

    public function updateData()
    {
        // POSTデータがなければデータを表示する
        if (!empty($_GET['id']) && empty($_POST['id'])) {
            $dsn = "mysql:dbname=" . self::DB_NAME . "; host=" . self::HOST . "; charset=" . self::UTF;
            $user = self::USER;
            $pass = self::PASS;
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // DBからデータを取得
            $sql = "SELECT * FROM contacts WHERE id = :id";
            $getStmt = $pdo->prepare($sql);
            // 値をセット
            $getStmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
            $getStmt->execute();
            // 表示するデータを取得
            $data = $getStmt->fetch();
            return $data;
        }
        // ポストデータがあればデータを更新する
        elseif (!empty($_POST['id'])) {
            // 登録するデータを用意
            $name = $_POST['name'];
            $kana = $_POST['kana'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $body = $_POST['body'];
            // トランザクション開始
            $pdo->beginTransaction();
            try {
                // SQL作成
                $setStmt = $pdo->prepare("UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id");
                // 登録するデータをセット
                $setStmt->bindValue(':name', $name, PDO::PARAM_STR);
                $setStmt->bindValue(':kana', $kana, PDO::PARAM_STR);
                $setStmt->bindValue(':tel', $tel, PDO::PARAM_INT);
                $setStmt->bindValue(':email', $email, PDO::PARAM_STR);
                $setStmt->bindValue(':body', $body, PDO::PARAM_STR);
                $setStmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
                // SQL実行
                $res = $setStmt->execute();
                // コミット
                if ($res) {
                    $pdo->commit();
                }
            } catch (Exception $e) {
                // エラーが発生した時はロールバック
                $pdo->rollBack();
            }
            // 更新に成功したら一覧に戻る
            if ($res) {
                header("Location: contact.php");
                exit;
            }
        }
        // データベースの接続を閉じる
        $setStmt = null;
        $pdo = null;
    }
}


class test
{
    public function deleteData()
    {
        // POSTデータがあればデータを削除する
        if (!empty($_POST['id'])) {
            // トランザクション開始
            $pdo->beginTransaction();
            $id = h($_POST["id"], ENT_QUOTES);
            try {
                // SQL作成
                $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
                // 登録するデータをセット
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                // SQL実行
                $res = $stmt->execute();
                // コミット
                if ($res) {
                    $pdo->commit();
                }
            } catch (Exception $e) {
                // エラーが発生した時はロールバック
                $pdo->rollBack();
            }
            // 更新に成功したら一覧に戻る
            if ($res) {
                header("Location: contact.php");
                exit;
            }
        }
    }
}
