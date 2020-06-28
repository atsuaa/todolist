<?php
require_once 'connect.php';

try {
  $db= connect();
  $sql= 'DELETE FROM todolist WHERE id = :id';
  $stt= $db-> prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stt-> execute(array(':id' => $_POST['id']));

} catch (PDOException $e) {
  die("エラーが発生しました。:{$e->getMessage()}");
}

$db= NULL;

header('Location: https://'. $_SERVER['HTTP_HOST']. '/index.php#listhead');
// header('Location: http://'. $_SERVER['HTTP_HOST']. '/todolist/index.php#listhead');
