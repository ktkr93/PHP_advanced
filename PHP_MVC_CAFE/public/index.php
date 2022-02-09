<?php
// ドキュメントルートのフルパスから'public'を検索し消去する
// 定数ROOT_PATHに代入する
define('ROOT_PATH', str_replace('public', '', $_SERVER["DOCUMENT_ROOT"]));
// リクエストされたパスとファイル名とクエリについて、それらの構成要素のうち特定できるものを連想配列にして返す
$parse = parse_url($_SERVER["REQUEST_URI"]);
// ファイル名が省略されていた場合、index.phpを補填する
if (mb_substr($parse['path'], -1) === '/') { // リクエストされたパスとファイル名とクエリについて、URLのパスの直前が「/」の場合
    // リクエストされたURLなどのパス部分を、実行されたPHPのパスやファイル名と結合する
    $parse['path'] .= $_SERVER["SCRIPT_NAME"];
}
require_once(ROOT_PATH . 'Views' . $parse['path']);
