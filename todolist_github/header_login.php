<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="./css/master.css" type="text/css">
    <link rel="stylesheet" href="./css/login.css" type="text/css">
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="./js/master.js"></script>
    <title>なんでもToDoList</title>
  </head>
  <body>
    <div class="wrapper">
    <header>
      <div class="header-logo"></div>
      <div class="header-title">
        <h1>なんでもToDoList</h1>
      </div>
      <div class="header-login">
        ログイン：<?= $_SESSION['user']['name']. '@'. $_SESSION['user']['userid']; ?>
      </div>
    </header>
    <nav>
      <ul>
        <li class=”current”><a href=index.php>Home</a></li>
        <li><a href=login.php>Login</a></li>
        <li><a href=logout.php>Logout</a></li>
        <li><a href=https://ataruproject.com/>Blog</a></li>
        <li><a href=register.php>新規登録</a></li>
      </ul>
    </nav>
