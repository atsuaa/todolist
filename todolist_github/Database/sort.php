<?php
//日付指定
if (empty($_POST['sort_date'])) {
  $whereDate='';
} else {
  $whereDate= "AND date = '{$_POST['sort_date']}' ";
}
//orderで順序を場合わけ
switch ($_POST['sort_order']) {
  case '時間順':
    $order= ' ORDER BY start';
    break;
  case '重要度順':
    $order= ' ORDER BY priority DESC';
    break;
}
