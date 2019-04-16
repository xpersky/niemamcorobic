<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new SimpleXMLElement('<chat/>');
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id = $_GET['id'];
  // QUERIES FOR SQL SETTING
  $sql =  "SELECT * from `chats` where `EventID`='".$id."'";
  $sql2 = "SELECT `user-id` from `events` where `ID`='".$id."'";
  $result = $db->getConnection()->query($sql);
  if (!$result) {
  die('Invalid query: ' . mysql_error());
  }
  $result2 = $db->getConnection()->query($sql2);
  $lead = $result2->fetch_assoc();
  header("Content-type: text/xml");
  while ($row = $result->fetch_assoc()){
    $message = $dom->addChild("message");
    $message->addChild("Leader",$lead['user-id']);
    $message->addChild("ID",$row['ID']);
      $uid = $row['UserID'];
      $sql3 = "SELECT `imie`,`url` from `users` where `ID`='".$uid."'";
      $result3 = $db->getConnection()->query($sql3);
      $inrow = $result3->fetch_assoc();;
    $message->addChild("UiD",$uid);
    $message->addChild("name",$inrow['imie']);
    $message->addChild("pic",htmlspecialchars($inrow['url']));
    $message->addChild("data", $row['Message']);
    $message->addChild("time", $row['Time']);
  }
echo $dom->asXML();
}
?>
