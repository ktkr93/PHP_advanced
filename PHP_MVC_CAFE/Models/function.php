<?php // **MODELS
class DB
{
    private $pdo;

    private static $dsn = 'mysql:dbname=casteria;host=127.0.0.1;charset=utf8';
    private static $username = 'root';
    private static $password = '';

    public $id;
    public $name;
    public $kana;
    public $tel;
    public $email;
    public $body;

    public function __construct()
    {
        $this->pdo = new PDO(self::$dsn, self::$username, self::$password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function allData()
    {
        try {
            // トランザクション開始
            $this->pdo->beginTransaction();
            // SQL作成
            $stmt = $this->pdo->prepare("SELECT * FROM contacts");
            // SQL実行
            $res = $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            // コミット
            if ($res) {
                $this->pdo->commit();
            }
        } catch (PDOException $e) {
            // エラーメッセージを出力
            echo $e->getMessage();
            // ロールバック
            $this->pdo->rollBack();
        } finally {
            // データベースの接続解除
            $this->pdo = null;
        }
    }

    public function createData($name, $kana, $tel, $email, $body)
    {
        try {
            // トランザクション開始
            $this->pdo->beginTransaction();
            // SQL作成
            $stmt = $this->pdo->prepare("INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)");
            // 登録するデータをセット
            $stmt->bindValue(':name', $this->name = $name, PDO::PARAM_STR);
            $stmt->bindValue(':kana', $this->kana = $kana, PDO::PARAM_STR);
            $stmt->bindValue(':tel', $this->tel = $tel, PDO::PARAM_INT);
            $stmt->bindValue(':email', $this->email = $email, PDO::PARAM_STR);
            $stmt->bindValue(':body', $this->body = $body, PDO::PARAM_STR);
            // SQL実行
            $res = $stmt->execute();
            // コミット
            if ($res) {
                $this->pdo->commit();
            }
        } catch (PDOException $e) {
            // エラーメッセージを出力
            echo $e->getMessage();
            // ロールバック
            $this->pdo->rollBack();
        } finally {
            // データベースの接続解除
            $this->pdo = null;
        }
    }

    public function updateData($id, $name, $kana, $tel, $email, $body)
    {
        try {
            // トランザクション開始
            $this->pdo->beginTransaction();
            // SQL作成
            $stmt = $this->pdo->prepare("UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id");
            // 登録するデータをセット
            $stmt->bindValue(':id', $this->id = $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $this->name = $name, PDO::PARAM_STR);
            $stmt->bindValue(':kana', $this->kana = $kana, PDO::PARAM_STR);
            $stmt->bindValue(':tel', $this->tel = $tel, PDO::PARAM_INT);
            $stmt->bindValue(':email', $this->email = $email, PDO::PARAM_STR);
            $stmt->bindValue(':body', $this->body = $body, PDO::PARAM_STR);
            // SQL実行
            $res = $stmt->execute();
            // コミット
            if ($res) {
                $this->pdo->commit();
            }
        } catch (PDOException $e) {
            // エラーメッセージを出力
            echo $e->getMessage();
            // ロールバック
            $this->pdo->rollBack();
        } finally {
            // データベースの接続解除
            $this->pdo = null;
        }
        // 更新に成功したら一覧に戻る
        if ($res) {
            header("Location: contact.php");
            exit;
        }
    }

    public function editData($id)
    {
        try {
            // トランザクション開始
            $this->pdo->beginTransaction();
            // SQL作成
            $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id = :id");
            // 登録するデータをセット
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            // SQL実行
            $res = $stmt->execute();
            // コミット
            if ($res) {
                $this->pdo->commit();
            }
        } catch (PDOException $e) {
            // エラーメッセージを出力
            echo $e->getMessage();
            // ロールバック
            $this->pdo->rollBack();
        } finally {
            // データベースの接続解除
            $this->pdo = null;
        }
        return $stmt->fetch();
    }

    public function deleteData($id)
    {
        try {
            // トランザクション開始
            $this->pdo->beginTransaction();
            // SQL作成
            $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = :id");
            // 登録するデータをセット
            $stmt->bindValue(':id', $this->id = $id, PDO::PARAM_INT);
            // SQL実行
            $res = $stmt->execute();
            // コミット
            if ($res) {
                $this->pdo->commit();
            }
        } catch (PDOException $e) {
            // エラーメッセージを出力
            echo $e->getMessage();
            // ロールバック
            $this->pdo->rollBack();
        } // 更新に成功したら一覧に戻る
        if ($res) {
            header("Location: contact.php");
            exit;
        }
    }
}
