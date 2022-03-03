<?php
$dsn = 'mysql:dbname=instant;host=db-host';
$user = 'dbuser';
$password = 'docker';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続に成功しました\n";
} catch (PDOException $e) {
    echo "接続に失敗しました\n";
    echo $e->getMessage() . "\n";
}
