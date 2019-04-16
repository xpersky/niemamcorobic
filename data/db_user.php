<?php
class User{
  protected $ID;
  protected $URL;
  protected $name;
  protected $mail;
  protected $age;
  protected $story;
  protected $rate;
  protected $awards;
  function __construct($db,$id){
    $user = $db->selectUSER($id);
    $this->ID = $user['ID'];
    $this->URL = $user['url'];
    $this->name = $user['imie'];
    $this->mail = $user['mail'];

    $birth = new DateTime($user['bday']);
    $byear = $birth->format("Y");
    $bmonth = $birth->format("m");
    $bday = $birth->format("d");

    $tyear = date("Y");
    $tmonth = date("m");
    $tday = date("d");

    $age = (int)$tyear - (int)$byear;
    if((int)$tmonth == (int)$bmonth) { if((int)$tday <= (int)$bday) $age--; }
    else if((int)$tmonth < (int)$bmonth) { $age--; }

    $this->age = $age;

    $this->story = $user['story'];
    $this->rate = $user['rate'];
    if($user['awards'] == NULL){
      $this->awards = "<div class=\"award\">BRAK</div>";
    }
    else $this->awards = $user['awards'];
  }
  function getID(){
    return $this->ID;
  }
  function getURL(){
    return $this->URL;
  }
  function getName(){
    return $this->name;
  }
  function getAge(){
    return $this->age;
  }
  function getStory(){
    return $this->story;
  }
  function getRate(){
    return $this->rate;
  }
  function getAwards(){
    return $this->awards;
  }
}
?>
