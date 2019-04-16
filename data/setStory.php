<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("errors");
$parnode = $dom->appendChild($node);
if((isset($_GET['UiD']) && !empty($_GET['UiD'])) && (isset($_GET['story']) && !empty($_GET['story'])))
{
  $Uid = $_GET['UiD'];
  $story = $_GET['story'];
  $sql =  "UPDATE `users` SET `story`='".$story."' where `ID`='".$Uid."'";
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
