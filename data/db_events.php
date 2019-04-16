<?php
class Event{
protected $ID;
protected $PICurl;
protected $LABEL;
protected $ExpireDate;
function __construct($id,$pic,$label,$date){
  $this->ID = $id;
  $this->PICurl = $pic;
  $this->LABEL = $label;
  $this->ExpireDate = $date;
}
function getID() {return $this->ID;}
function getPIC() {return $this->PICurl;}
function getLABEL() {return $this->LABEL;}
function getEXDATE() {return $this->ExpireDate;}
}
?>
