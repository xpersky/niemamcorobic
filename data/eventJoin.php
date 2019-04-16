<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("errors");
$parnode = $dom->appendChild($node);
if((isset($_GET['UiD']) && !empty($_GET['UiD'])) && (isset($_GET['eID']) && !empty($_GET['eID'])))
{
  $Uid = $_GET['UiD'];
  $eID = $_GET['eID'];

  $sql =  "SELECT count(*) as `total` from `myevents` where `UserID`='".$Uid."' and `EventID`='".$eID."'";
  $result = $db->getConnection()->query($sql);
  $count = $result->fetch_assoc();
  if($count['total'] == 0){
    $insert = "INSERT INTO `myevents`(`UserID`, `EventID`) VALUES ('".$Uid."','".$eID."')";
    $db->getConnection()->query($insert);
    $joinDate = date("G:i");
    $sql2 = "SELECT `imie` from `users` where `ID`='".$Uid."'";
    $nameres = $db->getConnection()->query($sql2);
    $user = $nameres->fetch_assoc();
    $username = $user['imie'];
    $joinedTOchat = "INSERT INTO `chats` (`EventID`,`UserID`,`Message`,`Time`) VALUES ('".$eID."','".$Uid."','".$username." dołączył do chatu.','".$joinDate."')";
    $db->getConnection()->query($joinedTOchat);
    $errorline = "noErrors";
  }
  else $errorline = "Already have joined.";
  header("Content-type: text/xml");
    $node = $dom->createElement("error");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("code",$errorline);
echo $dom->saveXML();
}
?>
