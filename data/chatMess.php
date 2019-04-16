<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("errors");
$parnode = $dom->appendChild($node);
if((isset($_GET['UiD']) && !empty($_GET['UiD'])) && (isset($_GET['eID']) && !empty($_GET['eID'])) && (isset($_GET['mess']) && !empty($_GET['mess'])))
{
  $Uid = $_GET['UiD'];
  $eID = $_GET['eID'];
  $mess = $_GET['mess'];
  $joinDate = date("G:i");
  $sql =  "INSERT INTO `chats`(`EventID`,`UserID`,`Message`,`Time`) VALUES ('".$eID."','".$Uid."','".$mess."','".$joinDate."')";
  $result = $db->getConnection()->query($sql);
  if($result) $errorline = "";
  else $errorline = "error";
  header("Content-type: text/xml");
    $node = $dom->createElement("error");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("code",$errorline);
echo $dom->saveXML();
}
?>
