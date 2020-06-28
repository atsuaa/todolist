<?php require_once 'header_login.php'; ?>

<?php
if (!empty($_GET['0'])) {
  print '入力内容が正しくありません。<br>';
  foreach ($_GET as $value) {
    print $value. '<br>';
  }
}

if ($_GET['userid']=='isset') {
  print 'そのユーザーIDはすでに使われています。';
}
if ($_GET['email']=='isset') {
  print 'そのemailはすでに使われています。';
}
 ?>


 <div id="formWrapper">
     <div id="form">
       <form class="" action="register-output.php" method="post">
         <div class="form-item">
           <label for="userid" class="formLabel">ログインID</label>
           <input  class="form-style" type="text" id="userid" name="userid" value="" autofocus required>
         </div>
         <div class="form-item">
           <label for="password" class="formLabel">パスワード</label>
           <input  class="form-style" type="password" id="password" name="password" value="" required>
         </div>
         <div class="form-item">
           <label for="password-re" class="formLabel">パスワード再入力</label>
           <input  class="form-style" type="password" id="password-re" name="password-re" value="">
         </div>
         <div class="form-item">
           <label for="email" class="formLabel">メールアドレス</label>
           <input  class="form-style" type="email" id="email" name="email" value="" required>
         </div>
         <div class="form-item">
           <label for="email-re" class="formLabel">メールアドレス再入力</label>
           <input  class="form-style" type="email" id="email-re" name="email-re" value="" required>
         </div>
         <div class="form-item">
           <label for="passwd" class="formLabel">ユーザー名</label>
           <input  class="form-style" type="text" id="name" name="name" value="" required>
         </div>
         <div class="form-item">
          <p>個人情報の取り扱い</p>
          <label for="passwd">同意する</label>
          <input type="radio" id="name" name="radio" value="agree">
          <label for="passwd">同意しない</label>
          <input type="radio" id="name" name="radio" value="disagree" checked>
         </div>
         <div class="form-item">
           <p class="pull-left"><a href="login.php"><small>Login</small></a></p>
           <input type="submit" class="login pull-right" id="login-btn" value="新規登録">
         <div class="clear-fix"></div>
         </div>
       </form>
     </div>
 </div>

 <?php require_once 'footer.php'; ?>
