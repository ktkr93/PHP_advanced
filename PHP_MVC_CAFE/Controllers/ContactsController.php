<?php // **CONTROLLERS
require_once('../Models/Contacts.php');

// エスケープ処理
function h($str, $charaset = 'UTF-8')
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charaset, false);
}

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
    }
}
