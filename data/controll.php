<?php
// Thats the brain of the app, include files and getting data from the database
// DATA MENAGMENT
session_start();
include_once "../data/database.php";
include_once "../data/db_events.php";
include_once "../data/db_user.php";
// DATABASE CONNECTION
$db = new MySQLconnectionTool("localhost","root","","nmcr");
// COMPONENT LIST
include_once "../components/userP.php";
include_once "../components/myeventListP.php";
include_once "../components/event_chatP.php";
include_once "../components/mapP.php";
include_once "../components/event_makerP.php";
include_once "../components/eventP.php";
// GET USER
$user = new User($db,$_SESSION['nmcrUSER_ID']);
// SET USER cookie
setcookie("UID", $user->getID(), time() + (86400 * 30), "/");
// GET USER EVENT LIST
$myevents = $db->getMyList($user->getID());
$EventList = array();
foreach($myevents as $val){
  $eventDesc = $db->getEventDesc($val);
  $admin = new User($db,$eventDesc['user-id']);
  $event = new Event($eventDesc['ID'],$admin->getURL(),$admin->getName(),$eventDesc['expire']);
  array_push($EventList,$event);
}
if(isset($_COOKIE['lat']) && isset($_COOKIE['lng'])){
  $_SESSION['lat'] = $_COOKIE['lat'];
  $_SESSION['lng'] = $_COOKIE['lng'];}
if(isset($_COOKIE['CID'])) {$_SESSION['CID'] = $_COOKIE['CID']; unset($_COOKIE['CID']);}
?>
