<?php // **CONTROLLERS
<<<<<<< HEAD
require_once('../Models/Contacts.php');

=======
// namespace Controllers;

require_once('../Views/Contact.php');
require_once('../Models/Contacts.php');


>>>>>>> main
// エスケープ処理
function h($str, $charaset = 'UTF-8')
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charaset, false);
}

<<<<<<< HEAD
$controller = new controller();

class controller
{
    private $mytable;

    public function __construct()
    {
        $this->mytable = new DB();
    }

    public function allData()
    {
        return $this->mytable->allData();
    }

    public function createData($name, $kana, $tel, $email, $body)
    {
        return $this->mytable->createData($name, $kana, $tel, $email, $body);
    }

    public function updateData($id, $name, $kana, $tel, $email, $body)
    {
        return $this->mytable->updateData($id, $name, $kana, $tel, $email, $body);
    }

    public function editData($id)
    {
        return $this->mytable->editData($id);
    }

    public function deleteData($id)
    {
        return $this->mytable->deleteData($id);
=======
// DBにアクセスし各SQLを実行する
$itemPost = new DB();

// 編集中…（2/10）
class controller
{
    public function __construct()
    {
    }
    public function post() // POSTで呼ばれた
    {
        if (isset($_POST['confirm'])) { // 送信するボタンが押された
            return view('confirm');
        }
        if (isset($_POST['submit'])) { // 送信するボタンが押された
            $name = h($_POST['name']);
            $kana = h($_POST['kana']);
            $tel = h($_POST['tel']);
            $email = h($_POST['email']);
            $body = h($_POST['body']);
            // $param = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // $this->logging($param);
            $mytable = new DB();
            $mytable->createData($name, $kana, $tel, $email, $body);
            /*
            $mytable->insert([ // レコード挿入
                'name'  => $param
            ]);
            */
            return view('complete');
        }
        if (isset($_POST['delete'])) { // deleteボタンを押された
            $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $this->logging(implode(',', $item));
            $mytable = new mytable();
            foreach ($item as $id => $val) {
                $mytable->delete([ // レコード削除
                    'id'  => $id
                ]);
            }
        }
        // テンプレートにパラメータを渡し、HTMLを生成し返却
        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => 'Hello',
            'list'      => $mytable->getAll()
        ]);
>>>>>>> main
    }
}
