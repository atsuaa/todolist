<?php require_once 'header.php'; ?>

<?php
require_once 'Database/connect.php';
require_once 'Component/validation_register.php';

if (!empty($error)) {
  $error= http_build_query($error);
  header('Location: https://'. $_SERVER['HTTP_HOST']. '/register.php?'. $error);
  exit;
}

try {
  $db= connect();

  //ユーザーIDがすでに使われていないか
  $sql='SELECT userid FROM user where userid = :userid';
  $stt= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stt->execute(array(':userid' => $_POST['userid']));
  $userid= $stt->fetchAll();
  if (!empty($userid)) {
    header('Location: https://'. $_SERVER['HTTP_HOST']. '/register.php?userid=isset');
    exit;
  }

  //emailがすでに使われていないか
  $sql='SELECT email FROM user where email= :email';
  $stt= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  $stt->execute(array(':email' => $_POST['email']));
  $email= $stt->fetchAll();
  if (!empty($email)) {
    header('Location: https://'. $_SERVER['HTTP_HOST']. '/register.php?email=isset');
    exit;
  }

  //プレースホルダー
  $sql= 'INSERT INTO user(userid, password, email, name)
        VALUES(:userid, :password, :email, :name)';
  //プリペアドステートメント
  $stt= $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
  //バインド
  $stt->execute(array(':userid' => $_POST['userid'],
                      ':password' => $_POST['password'],
                      ':email' => $_POST['email'],
                      ':name' => $_POST['name']));
  $db= NULL; //切断

} catch (PDOException $e) {
  exit("エラーが発生しました。:{$e->getMessage()}");
}
header('Location: https://'. $_SERVER['HTTP_HOST']. '/login.php?register=true');


 ?>

 <?php require_once 'footer.php'; ?>
