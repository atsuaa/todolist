<?php
session_start();
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
  print '<p>ログアウトしました。</p>';
}else {
  print '<p>すでにログアウトしています。</p>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3;URL=index.php">
    <title>なんでもToDoList</title>
  </head>
  <body>

  </body>
</html>
