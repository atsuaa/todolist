<?php session_start(); ?>
<?php
require_once 'Database/connect.php';
require_once 'Component/validation_login.php';

//バリデーションチェック
if (!empty($error)) {
  $error= http_build_query($error);
  header('Location: https://'. $_SERVER['HTTP_HOST']. '/login.php?'. $error);
  exit;
}

try {
  unset($_SESSION['user']);
  $db= connect();
  //プレースホルダー
  $sql= "SELECT userid, name FROM user WHERE userid = :userid and password = :password";
  //プリペアドステートメント
  $stt= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //バインド
  $stt->execute(array(':userid' => $_POST['userid'],
                      ':password' => $_POST['password'],));
  $row= $stt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['user']= ['userid' => $row['userid'],
                        'name' => $row['name']];

  $db= NULL; //切断
} catch (PDOException $e) {
  exit("エラーが発生しました。:{$e->getMessage()}");
}

if (!empty($_SESSION['user'])) {
    header('Location: https://'. $_SERVER['HTTP_HOST']. '/index.php');
} else {
  header('Location: https://'. $_SERVER['HTTP_HOST']. '/login.php?login=false');
}
 ?>
