<?php
if(!isset($_SESSION))
    {
        session_start();
    } 
if(isset($_SESSION['fbID']) && isset($_SESSION['fbSEC'])){
require_once "../Facebook/autoload.php";

$fb = new \Facebook\Facebook([
  'app_id' => $_SESSION['fbID'],
  'app_secret' => $_SESSION['fbSEC'],
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();
}
?>
