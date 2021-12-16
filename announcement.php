<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("location:administrative-login.php");
  }
?>
<html lang="tr">
  <head>
    <title>TSC - Yönetici Paneli</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <style>
      .container{
        width:auto !important;
        padding-right: 0px !important;
      }
      .navbar-nav li a:hover, .navbar-nav li.active a{
      	color: rgb(119, 119, 119) !important;
      	background-color: #f0ecec !important;
      }
      .dark-bg{
        background-color: #d4d4d4;
        border-radius: 0px !important;
      }
      .navbar-brand{
                margin-right: 10px;
              }

    </style>
  </head>
  <body>
    <div id="page-container" class="container-fluid col-sm-10 col-sm-offset-1">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div id="navbar-container" class="container">
          <a class="navbar-brand" href="" >
            <img src="img/logo-nav.png" alt="TSC" height="50" width="50">
          </a>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-left">
              <li><a href=""><strong>Hoşgeldin <?php if(isset($_SESSION['real_name'])){echo $_SESSION['real_name']; } ?></strong></a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
              <li><a href=""><strong>TSC Yönetim Paneli</strong></a></li>
              <li><a type="submit" name="logout" class="btn btn-sm dark-bg">Çıkış Yap</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </body>
</html>
