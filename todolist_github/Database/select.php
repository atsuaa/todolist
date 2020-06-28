<?php
require_once 'connect.php';
require_once 'Escape.php';
try {
  $db= connect();
//セッション情報にパーツで入れておいた
$where = $_SESSION['user']['where'];
$whereDate = $_SESSION['user']['whereDate'];
$whereTag = $_SESSION['user']['whereTag'];
$order = $_SESSION['user']['order'];
$pagenation = $_SESSION['user']['pagenation'];

//select文を部品化
$select= 'SELECT * FROM todolist ';
//セッション機能追加
$where= "WHERE userid = '{$_SESSION['user']['userid']}' ";

//並び順
if (empty($_SESSION['user']['order'])) {
  $order= ' ORDER BY id DESC';
}

//sort.phpから$sqlを持ってくる $sqlの続き
if (isset($_POST['sort'])) {
  require_once 'Database/sort.php';
}

//タグ付けされたとき（タイトルをクリック）
if ($_GET['title']) {
  $whereTag = "AND title = '{$_GET['title']}' ";
}

//日付リンククリック
if ($_GET['date']) {
  $date = date('Y'). '-'. $_GET['date'];
  $whereDate = "AND date = '{$date}' ";
}

//ページ
require_once 'Pagenation.php';

//sql文合体
$sql= $select. $where. $whereDate. $whereTag. $order. $pagenation;

//sql文保持
$_SESSION['user']['where'] = $where;
$_SESSION['user']['whereDate'] = $whereDate;
$_SESSION['user']['whereTag'] = $whereTag;
$_SESSION['user']['order'] = $order;
$_SESSION['user']['pagenation'] = $pagenation;

//タグ変数を空にする
$whereTag = '';

  $stt= $db->prepare("$sql");
  $stt->execute();

  while ($row= $stt->fetch(PDO::FETCH_ASSOC)) {
    $row['date']= substr($row['date'], 5);
    $row['start']= substr($row['start'], 0, 5);
    $row['finish']= substr($row['finish'], 0, 5);
  ?>
  <div class="list-box">
    <ul>
      <div class="list-title">
        <?php $title = htmlspecialchars($row['title']); ?>
        <li><h4><a href=".?title=<?= $title?>"><?= $title?></a></h4></li>
      </div>
      <!-- <div class="">
        <li><?php //es($row['userid']); ?></li>
      </div> -->
      <div class="list-content">
        <li><?php print nl2br($row['comment']); ?></li>
      </div>
      <div class="list-below">
        <div class="below-left">
          <?php $title = htmlspecialchars($row['date']); ?>
          <li><a href=".?date=<?= $title?>"><?= $title?></a></li>
        </div>
        <div class="below-center">
          <li><?php es($row['start']); ?></li>
        </div>
        <div class="below-right">
          <li><?php es($row['finish']); ?></li>
        </div>
      </div>
      <div class="list-under">
        <div class="under-left">
          <li><span><?php es($row['priority']); ?></span></li>
        </div>
        <div class="under-right">
          <form class="" action="Database/delete.php" method="post">
            <input type="hidden" name="id" value="<?php es($row['id']); ?>">
            <input type="submit" name="delete" value="削除">
          </form>
        </div>
      </div>
    </ul>
  </div>
  <?php
  }
  $db= NULL;

} catch (PDOException $e) {
  die("エラーが発生しました。:{$e->getMessage()}");
}
