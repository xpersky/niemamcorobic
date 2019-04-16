<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0">
<link rel="icon" href="../img/icon.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="../style/app.css">
<?php
  include_once "../data/controll.php";
 ?>
</head>
<body>
  <?php if(isset($_SESSION['fb_access_token'])) {
    if(isset($_SESSION['ERROR_CODE'])) {$error = $_SESSION['ERROR_CODE']; unset($_SESSION['ERROR_CODE']);}
    else $error = ""; ?>
<div id="header">
  <div id="logo"><img src="../img/logo.svg"></img>iemamcorobic.pl</div>
</div>
<div id="container">
  <div id="map"></div>
  <div id="event_btn">
    <div class="label">Utwórz wydarzenie</div>
  </div>
  <div id="event_maker" class="pane">
    <?php
       Render_EventMakerPane();
    ?>
  </div>
  <div id="user_pane">
    <?php
    Render_UserPane($user);
    ?>
  </div>
  <div id="event_pane" class="pane">
      <?php Render_EventPane(); ?>
  </div>
  <div id="my_event_list" class="pane">
    <?php
      Render_MyEventListPane($EventList);
    ?>
  </div>
  <div id="event_chat" class="pane">
    <?php
      Render_EventChatPane($messages,"1","1");
    ?>
  </div>
  <div id="sbtncon" onclick="showlist(this)">
    <div class="showme"><div class="shicon"><i class="fas fa-angle-double-up"></i></div>
  </div></div>
</div>
<div id="loading">
<div class="circles">
<div class="circle_1"></div>
<div class="circle_2"></div></div>
<div class="l_title">Trwa wczytywanie...</div>
</div>
<div id="tester"></div>
<input type="hidden" id="error_handle" value="<?php echo $error; ?>">
<script type="text/javascript" src="../jscontroll/app.js"></script>
<?php Render_MapPane(); ?>
<?php
if(isset($_SESSION['gKEY'])){
  $url = "https://maps.googleapis.com/maps/api/js?key=".$_SESSION['gKEY']."&libraries=places&callback=initMap";
  echo "<script src=\"".$url."\"async defer></script>";
}
?>

<?php } else header('Location: ../page/login.php'); ?>
</body>
</html>
