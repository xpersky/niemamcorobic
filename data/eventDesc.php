<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("statusinfo");
$parnode = $dom->appendChild($node);
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $id = $_GET['id'];
  $sql =  "SELECT `terms` from `events` where `ID`='".$id."'";
  $result = $db->getConnection()->query($sql);
  if (!$result) {
  die('Invalid query: ' . mysql_error());
  }
  header("Content-type: text/xml");
  while ($row = $result->fetch_assoc()){
    $node = $dom->createElement("content");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("Terms",$row['terms']);
  }
echo $dom->saveXML();
}
?>
