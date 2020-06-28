<?php
	$error = array();
	/*新規登録のバリデーション*/

  //正規表現（半角数字のみ）
  if (!preg_match('/^[a-zA-Z0-9]{1,20}$/', $_POST['userid'])) {
    $error[] = "「ログインID」は半角数字で1~20字で入力してください。";
  }

	//正規表現（半角数字のみ）
  if (!preg_match('/^[a-zA-Z0-9]{8,16}$/', $_POST['password'])) {
    $error[] = "「パスワード」は半角数字で8~16字で入力してください。";
  }

	//ユーザー名
  if (!preg_match('/^.{1,20}$/', $_POST['name'])) {
    $error[] = "「ユーザー名」は1~20字で入力してください。";
  }

	//email
  if (!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST['email'])) {
    $error[] = "正しいアドレスを入力してください。";
  }

  //再入力事項不一致1
  if ($_POST['password'] !== $_POST['password-re']) {
    $error[]= "第２パスワードが違います。";
  }
  //再入力事項不一致2
  if ($_POST['email'] !== $_POST['email-re']) {
    $error[]= "第２emailが違います。";
  }

  //radio
  if ($_POST['radio']=='disagree') {
    $error[]= "同意する必要があります。";
  }
