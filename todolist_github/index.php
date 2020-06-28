<?php
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);
 ?>
<?php require_once 'header.php'; ?>
<div class="dark"></div>
    <div class="main">
      <h1>Task Scheduling</h1>
      <section>
        <h2>今日のやることを追加してくれ</h2>
        <?php
        if (isset($_GET[0])) {
          print '<p>フォームが正しくありません。</p><br>';
          foreach ($_GET as $value) {
            print $value. '<br>';
          }
        }
        if ($_GET['session']=='false') {
          print '<p>ログインしてください。<br>
                もしくはセッションが無効か、タイムアウトしています。</p><br>';
        }
         ?>
        <form class="insert-box" action="Database/insert.php" method="post">
          <div class="insert-left">
            <div class="cp_iptxt">
              <label class="ef">タイトル
                <input type="text" name="title" value="" placeholder="タグがつきます" required>
              </label>
            </div>
            <div class="cp_iptxt">

            </div>
            <div class="cp_iptxt">
              <label class="ef">重要度<input type="number" name="priority" value="1" required></label>
            </div>
          </div>
          <div class="inset-center">
            <div class="cp_iptxt">
              <label class="ef">ここにやることを入力
                <textarea class="textlines" name="comment" rows="11" cols="70" wrap="hard" required></textarea>
              </label>
            </div>
          </div>
          <div class="insert-right">
            <div class="cp_iptxt">
              <label class="date-form"><p>日付</p><input type="date" name="date" value="<?= date('Y-m-d'); ?>"></label>
            </div>
            <div class="cp_iptxt">
              <label class="date-form"><p>開始時間</p><input type="time" name="start" value="<?= date('H:i'); ?>"></label>
            </div>
            <div class="cp_iptxt">
              <label class="date-form"><p>終了時間</p><input type="time" name="finish" value="<?= date("H:i",strtotime("+1 hour")); ?>"></label>
            </div>
            <div class="submit">
              <input type="submit" name="" value="追加">
            </div>
          </div>
        </form>
      </section>
      <h2 id="listhead">ToDoList</h2>
<!-- ソート機能 -->
      <section>
        <div class="sort-box">
          <form class="sort-row" action=".#listhead" method="post">
            <div class="sort-select">
              <label class="sort-nav" for="order"><h4>表示順</h4></label>
              <select class="sort-order" id="order" name="sort_order">
                <option value="新着順">新着順</option>
                <option value="時間順">時間順</option>
                <option value="重要度順">重要度順</option>
              </select>
            </div>
            <div class="sort-date">
              <input type="date" name="sort_date" value="<?= date('Y-m-d'); ?>">
            </div>
            <input type="hidden" name="sort">
            <div class="sort-button">
              <input type="submit" name="" value="変更">
            </div>
          </form>
        </div>
      </section>
<!-- ページネーション -->
      <div class="page-box">
        <?php
        require_once 'Database/PageNumber.php';
         ?>
      </div>
<!-- 一覧 -->
      <div class="list-content-range">
        <?php require 'Database/select.php';?>
      </div>
    </div>
<?php require_once 'footer.php'; ?>
