<?php
$dom = new DOMDocument("1.0");
$node = $dom->createElement("errors");
$parnode = $dom->appendChild($node);
if((isset($_GET['fbID']) && !empty($_GET['fbID'])) && (isset($_GET['fbSEC']) && !empty($_GET['fbSEC'])) && (isset($_GET['gKEY']) && !empty($_GET['gKEY'])))
{
  $fbID = $_GET['fbID'];
  $fbSEC = $_GET['fbSEC'];
  $gKEY = $_GET['gKEY'];
  session_start();
  $_SESSION['fbID'] = $fbID;
  $_SESSION['fbSEC'] = $fbSEC;
  $_SESSION['gKEY'] = $gKEY;

  $sql1 = "CREATE DATABASE IF NOT EXISTS nmcr";
  $sql2 = "CREATE TABLE IF NOT EXISTS `chats` ("
          . " `ID` int(11) NOT NULL AUTO_INCREMENT,"
          . " `EventID` int(11) NOT NULL,"
          . " `UserID` int(11) NOT NULL,"
          . " `Message` varchar(255) COLLATE latin1_general_ci NOT NULL,"
          . " `Time` char(16) COLLATE latin1_general_ci NOT NULL,"
          . " PRIMARY KEY (`ID`)"
          . ") ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci";
  $sql3 = "CREATE TABLE IF NOT EXISTS `events` ("
          . " `ID` int(30) unsigned NOT NULL AUTO_INCREMENT,"
          . " `user-id` int(30) unsigned NOT NULL,"
          . " `miejsce` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,"
          . " `lat` decimal(10,8) NOT NULL,"
          . " `lng` decimal(10,8) NOT NULL,"
          . " `expire` char(16) COLLATE latin1_general_ci NOT NULL,"
          . " `terms` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,"
          . " PRIMARY KEY (`ID`)"
          . ") ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci";
  $sql4 = "CREATE TABLE IF NOT EXISTS `myevents` ("
          . " `UserID` int(11) NOT NULL,"
          . " `EventID` int(11) NOT NULL"
          . ") ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci";
  $sql5 = "CREATE TABLE IF NOT EXISTS `users` ("
          . " `ID` int(30) NOT NULL AUTO_INCREMENT,"
          . " `FB-ID` varchar(50) COLLATE latin1_general_ci NOT NULL,"
          . " `imie` varchar(30) COLLATE latin1_general_ci NOT NULL,"
          . " `mail` varchar(50) COLLATE latin1_general_ci NOT NULL,"
          . " `bday` char(10) COLLATE latin1_general_ci NOT NULL,"
          . " `url` varchar(255) COLLATE latin1_general_ci NOT NULL,"
          . " `story` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,"
          . " `rate` float(10,2) NOT NULL,"
          . " `awards` int(2) DEFAULT NULL,"
          . " PRIMARY KEY (`ID`)"
          . ") ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci";
  $connection = new mysqli("localhost","root","");
  if($connection->connect_error){
    die("Nie udało się połączyć z bazą danych - ".$connection->connect_error);
  }
  $connection->query($sql1);
  $connection->close();
  $connection = new mysqli("localhost","root","","nmcr");
  $connection->query($sql2);
  $connection->query($sql3);
  $connection->query($sql4);
  $connection->query($sql5);
  header("Content-type: text/xml");
    $node = $dom->createElement("error");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("code","done");
echo $dom->saveXML();
}
?>
