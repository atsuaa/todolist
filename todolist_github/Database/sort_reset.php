<?php
session_start();
//セッション情報にパーツで入れておいた
$_SESSION['user']['whereDate'] = $whereDate = '';
$_SESSION['user']['whereTag'] = $whereTag = '';
$_SESSION['user']['order'] = $order = '';

header('Location: https://'. $_SERVER['HTTP_HOST']. '/index.php#listhead');
// header('Location: http://'. $_SERVER['HTTP_HOST']. '/todolist/index.php#listhead');
 ?>
