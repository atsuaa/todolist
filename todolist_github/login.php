<?php require_once 'header_login.php'; ?>
<?php
if ($_GET['register']== 'true') {
  print '<h1>ユーザー登録完了！</h1>
         <h2>ようこそ</h2>';
}

if (!empty($_GET['0'])) {
  print '入力内容が正しくありません。';
  foreach ($_GET as $value) {
    print $value. '<br>';
  }
}

if ($_GET['login']=='false') {
  print 'ログインに失敗しました。';
}
 ?>

<div id="formWrapper">
    <div id="form">
      <form class="" action="login-output.php" method="post">
        <div class="form-item">
            <p class="formLabel">ログインID：</p>
            <input type="text" name="userid" id="userid" class="form-style" autofocus required>
        </div>
        <div class="form-item">
            <p class="formLabel">パスワード：</p>
            <input type="password" name="password" id="password" class="form-style" required>
            <!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
            <p><a href="#" ><small>Forgot Password ?</small></a></p>
        </div>
        <div class="form-item">
        <p class="pull-left"><a href="register.php"><small>Register</small></a></p>
        <input type="submit" class="login pull-right" id="login-btn" value="Log In">
        <div class="clear-fix"></div>
        </div>
      </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>
