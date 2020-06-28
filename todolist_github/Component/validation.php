<?php
function validation($data) {

	$error = array();

	// タイトルのバリデーション
	if( empty($data['title']) ) {
		$error[] = "「タイトル」は必ず入力してください。";
	}

	// 重要度のバリデーション
	if( empty($data['priority']) ) {
		$error[] = "「重要度」は必ず入力してください。";
	}
  //正規表現（半角数字のみ）
  if (!preg_match('/^[0-9]*$/', $data['priority'])) {
    $error[] = "「重要度」は半角数字で入力してください。";
  }

	// memo内容
	if( empty($data['comment']) ) {
		$error[] = "「やること」は必ず入力してください。";
	}

	return $error;
}
