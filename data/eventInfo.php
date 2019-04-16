<?php
include_once "../data/controll.php";
$db = new MySQLconnectionTool("localhost","root","","nmcr");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("events");
$parnode = $dom->appendChild($node);
if(isset($_SESSION['lat']) && isset($_SESSION['lng']))
{
  $lat = $_SESSION['lat'];
  $lng = $_SESSION['lng'];
  $sql =  "SELECT events.ID as id,url,miejsce,lat,lng,( 6371 * acos( cos( radians($lat) ) * cos( radians(lat) ) *".
          "cos( radians(lng) - radians($lng)) + sin(radians($lat)) * sin( radians(lat))))".
          "AS distance, terms FROM events , users where users.id=`user-id` ORDER BY distance LIMIT 100";
  $result = $db->getConnection()->query($sql);
  if (!$result) {
  die('Invalid query: ' . mysql_error());
  }
  header("Content-type: text/xml");
  while ($row = $result->fetch_assoc()){
    $node = $dom->createElement("event");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id",$row['id']);
    $newnode->setAttribute("url",$row['url']);
    $newnode->setAttribute("place", $row['miejsce']);
    $newnode->setAttribute("lat", $row['lat']);
    $newnode->setAttribute("lng", $row['lng']);
    $newnode->setAttribute("terms", $row['terms']);
  }
echo $dom->saveXML();
}
?>
