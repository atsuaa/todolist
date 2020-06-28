<?php
function connect()
{
  $dsn= '';
  $usr= '';
  $passwd= '';

  try {
    $db= new PDO($dsn, $usr, $passwd);
    return $db;
  } catch (PDOException $e) {
    exit("データベースに接続できません。：{$e->getMessage()}");
  }
}

 ?>
