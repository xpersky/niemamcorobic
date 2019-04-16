<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="../img/icon.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="../style/login.css">
</head>
<body>
<?php
      session_start();
      if(isset($_SESSION['fbID']) && isset($_SESSION['fbSEC'])){
      require_once "../fb/config.php";
      $redirectURL = "http://localhost/niemamcorobic.pl/fb/callback.php";
      $permissions = ['email','user_birthday'];
      $loginURL = $helper->getLoginUrl($redirectURL,$permissions);
      }
      include_once "../components/login_controll.php";
?>
<div id="header">
<div id="logo"><img src="../img/logo.svg"></img>iemamcorobic.pl</div>
</div>
<div class="container">
<a href="<?php echo $loginURL; ?>" class="register">Zaloguj przez &nbsp <i class="fab fa-facebook"></i></a>
<div id="login" onmouseenter="this.style.background = '#090A0A'; this.style.transform = 'translate(-50%,-25px)scale(1.05)';"
                onmouseleave="this.style.background = 'rgba(0,0,0,0.9)'; this.style.transform = 'translate(-50%,-25px)scale(1)';"
                onclick="login_form(this); this.onclick = null;">Konfiguracja &nbsp <i class="fas fa-cog"></i></div>
</div>
<?php
Render_LoginScript();
?>
</body>
</html>
