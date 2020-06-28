<?php
$error = array();

/*ログイン機能のバリデーションチェック*/
// userid
if (!preg_match('/^[a-zA-Z0-9]{1,20}$/', $_POST['userid'])) {
  $error[] = "「ログインID」は半角英数字で1~20字で入力してください。";
}
// password
if (!preg_match('/^[a-zA-Z0-9]{8,16}$/', $_POST['password'])) {
  $error[] = "「パスワード」は半角英数字で8~16字で入力してください。";
}
var_dump($_POST);
var_dump($error);
