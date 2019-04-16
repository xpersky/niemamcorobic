<?php
session_start();
if(isset($_SESSION['fbID']) && isset($_SESSION['fbSEC'])){
$fb = new Facebook\Facebook([
  'app_id' => $_SESSION['fbID'],
  'app_secret' => $_SESSION['fbSEC'],
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('localhost/niemamcorobic.pl/fb/fb_callback.php', $permissions);

function GetFacebookUrl() {
  echo htmlspecialchars($loginUrl);
}
}
?>
