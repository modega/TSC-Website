<?php
  $login_failed = false;
  include('login.php');
  ob_start();
  session_start();
  if(isset($_POST["Login"])){
    $login_failed = adminLogin($_POST["username"],$_POST["userpassword"]);
    if($login_failed){
      header("location:announcement.php");
    }
    if(!$login_failed){
      
    }
  }
?>
<html>
  <head lang="tr">
    <title>TSC - Yönetici Girişi</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  </head>
  <body>
    <div id="page-container" class="container-fluid col-sm-8 col-sm-offset-2">
      <div id="login-container" class="container-fluid">
        <div class="card content-card container">
          <h1 class="text-center text-color text-header-font"><strong>YÖNETİCİ GİRİŞİ</strong></h1><br><br>
            <form action="administrative-login.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                  <input name="username" type="text" class="form-control" id="userName" placeholder="Kullanıcı Adı">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                  <input name="userpassword" type="password" class="form-control" id="contactEmail" placeholder="Şifre">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="Login" class="btn btn-default btn-lg btn-block">Giriş Yap</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
