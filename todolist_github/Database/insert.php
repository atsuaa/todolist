<?php
session_start();
$userid= $_SESSION['user']['userid'];

if (empty($_SESSION['user'])) {
  header('Location: https://'. $_SERVER['HTTP_HOST']. '/index.php?session=false');
  exit;
}

require_once 'connect.php';
require_once '../Component/validation.php';

$error= validation($_POST);
if (!empty($error)) {
  $error= http_build_query($error);
  header('Location: https://'. $_SERVER['HTTP_HOST']. '/index.php?'. $error);
}else {
  try {
    $inDate= date('Y-m-d');
    $inStart= date('H:i:s');
    $inFinish= date('H:i:s');
    $inDate= $_POST['date'];
    $inStart= $_POST['start'];
    $inFinish= $_POST['finish'];

    $db= connect();
    //プレースホルダー
    $sql= 'INSERT INTO todolist(title, userid, comment, date, start, finish, priority)
          VALUES(:title, :userid, :comment, :date, :start, :finish, :priority)';
    //プリペアドステートメント
    $stt= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    //バインド
    $stt->execute(array(':title' => $_POST['title'],
                        ':userid' => $userid,
                        ':comment' => $_POST['comment'],
                        ':date' => $inDate,
                        ':start' => $inStart,
                        ':finish' => $inFinish,
                        ':priority' => $_POST['priority']));
    $db= NULL; //切断
  } catch (PDOException $e) {
    exit("エラーが発生しました。:{$e->getMessage()}");
  }
  header('Location: http://'. $_SERVER['HTTP_HOST']. '/todolist/index.php');
}
