<?php // **CONTROLLERS
require_once('../Models/function.php');

// エスケープ処理
function h($str, $charaset = 'UTF-8')
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charaset, false);
}

// DBにアクセスし各SQLを実行する
$itemPost = new DB();
