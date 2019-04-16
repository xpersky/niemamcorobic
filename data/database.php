<?php
class MySQLconnectionTool{
  protected $connection;
  function __construct($host,$user,$pass,$db){ // connect to database
    $this->connection = new mysqli($host,$user,$pass,$db);
    if($this->connection->connect_error){
      die("Nie udało się połączyć z bazą danych - ".$this->connection->connect_error);
    }
  }
  function __destruct(){ // close connection
    $this->connection->close();
  }
  // USER SELECTS
  function selectFBUSER($fbID){
    $sql = "SELECT * from `users` where `FB-ID`='".$fbID."'";
    $result = $this->connection->query($sql);
    $user = $result->fetch_assoc();
    return $user;
  }
  function selectUSER($ID){
    $sql = "SELECT * from `users` where `ID`='".$ID."'";
    $result = $this->connection->query($sql);
    $user = $result->fetch_assoc();
    return $user;
  }
  function count($ID){
    $sql = "SELECT count(`FB-ID`) as `count` from `users` where `FB-ID`=$ID";
    $result = $this->connection->query($sql);
    $count = $result->fetch_assoc();
    return $count['count'];
  }
  function getMarkerPic($ID){
    $sql = "SELECT `url` from `users` where `ID`='$ID'";
    $result = $this->connection->query($sql);
    $url = $result->fetch_assoc();
    return $url['url'];
  }
  // EVENTS SELECTS
  function getMyList($ID){
    $sql = "SELECT `EventID` from `myevents` where `UserID`='$ID'";
    $result = $this->connection->query($sql);
    $events = array();
    while($EID = $result->fetch_assoc()){
      array_push($events,$EID['EventID']);
    }
    return $events;
  }
  function getEventDesc($ID){
    $sql = "SELECT * from `events` where `ID`=$ID";
    $result = $this->connection->query($sql);
    $event = $result->fetch_assoc();
    return $event;
  }
  function getEventID($id,$place,$date){
    $select =   "SELECT `ID` from `events` where `user-id`='$id' and `miejsce`='$place' and `expire`='$date'";
    $result = $this->connection->query($select);
    $count = $result->fetch_assoc();
    return $count['ID'];
  }
  function catchDuplicates($id,$place,$date){
    $select =   "SELECT count(`ID`) as `count` from `events` where `user-id`='$id' and `miejsce`='$place' and `expire`='$date'";
    $result = $this->connection->query($select);
    $count = $result->fetch_assoc();
    return $count['count'];
  }
  // EVERY OTHER QUERY
  function question($query){
    $this->connection->query($query);
  }
  function getConnection(){
    return $this->connection;
  }

}
?>
