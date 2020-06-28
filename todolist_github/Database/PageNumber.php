<?php
require_once 'connect.php';
$userid= $_SESSION['user']['userid'];
$where = $_SESSION['user']['where'];
$whereDate = $_SESSION['user']['whereDate'];
if ($_GET['date']) {
  $date = date('Y'). '-'. $_GET['date'];
  $whereDate = "AND date = '{$date}' ";
}
$whereTag = $_SESSION['user']['whereTag'];
if ($_GET['title']) {
  $whereTag = "AND title = '{$_GET['title']}' ";
}

$db= connect();
$stt= $db->prepare("SELECT count(id) FROM todolist $where $whereDate $whereTag");
$stt->execute();
$count= $stt->fetch();

$db= NULL;

//ここから表示の機能を実装
$max= 10; //表示最大数
$count[0]; // トータルデータ件数
$max_page = (int)ceil($count[0] / $max); // トータルページ数※ceilは小数点を切りあげる関数

isset($_GET['page_id'])? $n = $_GET['page_id']: $n = 1; //ページ数

?>
<div class="page-num" style="margin-left:20px">
<?php

if($n > 1){ // リンクをつけるかの判定
    echo '<a href=\'index.php?page_id='.($n - 1).'#listhead\'>前へ　</a>';
} else {
    echo '前へ　';
}

for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
    if ($i == $n) { // 現在表示中のページ数の場合はリンクを貼らない
        echo $n. '　';
    } else {
        echo "<a href='index.php?page_id={$i}#listhead'>". $i. '</a>　';
    }
}

if($n < $max_page){ // リンクをつけるかの判定
    echo '<a href=\'index.php?page_id='.($n + 1).'#listhead\'>次へ</a>';
} else {
    echo '次へ';
}
?>
</div>
<div style="margin-left:20px">
  <a href="Database/sort_reset.php">ソートリセット</a>
</div>
