<?php
include_once "../data/database.php";
session_start();
if(isset($_SESSION['fb_access_token'])) {
$id = $_SESSION['nmcrUSER_ID'];
$place = $_POST[$_POST["input_place_name"]];
$date =  $_POST["event_date"];
$termList = array();
for($i = 0; $i < $_POST["termCount"] ; $i++){
  array_push($termList,$_POST["event_term_".$i]);
}
$termstring = "";
foreach($termList as $val) {
$termstring .= $val.";";
}

$everythingKAY = TRUE;

if (!filter_var($place, FILTER_SANITIZE_SPECIAL_CHARS)) $everythingKAY = FALSE;
if (!filter_var($termstring, FILTER_SANITIZE_SPECIAL_CHARS)) $everythingKAY = FALSE;

$time = new DateTime($date);
if( (int)($time->format("Y")) < (int)(date("Y")) ) $everythingKAY = FALSE;
else if( (int)($time->format("Y")) == (int)(date("Y")) ) {
    if( (int)($time->format("m")) < (int)(date("m")) ) $everythingKAY = FALSE;
    else if( (int)($time->format("m")) == (int)(date("m")) ) {
      if( (int)($time->format("d")) < (int)(date("d")) ) $everythingKAY = FALSE;
      else if( (int)($time->format("d")) == (int)(date("d")) ) {
        if( (int)($time->format("H")) < (int)(date("H")) ) $everythingKAY = FALSE;
        else if( (int)($time->format("H")) == (int)(date("H")) ){
          if( (int)($time->format("i")) <= (int)(date("i")) ) $everythingKAY = FALSE;
      }
    }
  }
}
$lat = $_POST["lat"];
$lng = $_POST["lng"];

if($everythingKAY){
  $db = new MySQLconnectionTool("localhost","root","","nmcr");
  $count = $db->catchDuplicates($id,$place,$date);
  if($count == 0){
    $insert =  "INSERT INTO `events` (`user-id`,`miejsce`,`lat`,`lng`,`expire`,`terms`) VALUES".
            "('".$id."','".$place."','".$lat."','".$lng."','".$date."','".$termstring."')";
    $db->question($insert);
    $EiD = $db->getEventID($id,$place,$date);
    $updateMyList = "INSERT INTO `myevents` (`UserID`,`EventID`) VALUES ('".$id."','".$EiD."')";
    $db->question($updateMyList);
    $user = $db->selectUSER($id);
    $joinDate = date("G:i");
    $joinedTOchat = "INSERT INTO `chats` (`EventID`,`UserID`,`Message`,`Time`) VALUES ('".$EiD."','".$id."','".$user['imie']." dołączył do chatu.','".$joinDate."')";
    $db->question($joinedTOchat);
  }
  header('Location: ../page/app.php');
}
else { $_SESSION['ERROR_CODE'] = "Dane nieprawidłowe, wydarzenie odrzucone."; header('Location: ../page/app.php');}
}
else header('Location: ../page/login.php');


?>
