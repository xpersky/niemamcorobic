<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("members");
$parnode = $dom->appendChild($node);
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id = $_GET['id'];
  $sql =  "SELECT `imie`,`url`,`bday` from `users` , `myevents` where `users`.`ID`=`myevents`.`UserID` and `EventID`='".$id."'";
  $result = $db->getConnection()->query($sql);
  if (!$result) {
  die('Invalid query: ' . mysql_error());
  }
  header("Content-type: text/xml");
  while ($row = $result->fetch_assoc()){
    $node = $dom->createElement("member");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("imie",$row['imie']);
    $newnode->setAttribute("url",$row['url']);
    $bday = $row['bday'];
    $bdate = new DateTime($bday);
    $today = new DateTime();
    $res = $today->diff($bdate);
    $age = $res->y;
    $newnode->setAttribute("age",$age);
  }
echo $dom->saveXML();
}
?>
