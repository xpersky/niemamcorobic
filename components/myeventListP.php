<?php
function Render_MyEventListPane($EventArray){
  echo  "<div class=\"title\">Moja Lista</div>".
        "<div class=\"listcontainer\">".
        "<div class=\"list\">";
    $now = new DateTime();
  foreach ($EventArray as $value) {
    $date = new DateTime($value->getEXDATE());
    $my   = $date->diff($now);
    $day  = $my->format("%d");
    $hour = $my->format("%H");
    $min  = $my->format("%i");
    $color = "rgba(255,255,255,0.75)";
    if((int)$day > 0) {
      if((int)$day > 1 ) $time = $day." dni";
      else $time = "1 dzień";
    }
    else if((int)$hour > 0) {
      if(((int)$hour >= 22 && (int)$hour <= 24) || ((int)$hour >= 2 && (int)$hour <= 4) ) $time = (int)$hour." godziny";
      else if((int)$hour > 1) $time = (int)$hour." godzin";
      else {$time = "1 godzina"; $color = "rgba(255,0,0,0.75)";}
    }
    else if((int)$min > 0) {
      if(
        ((int)$min >= 2 && (int)$min <= 4) ||
        ((int)$min >= 22 && (int)$min <= 24) ||
        ((int)$min >= 32 && (int)$min <= 34) ||
        ((int)$min >= 42 && (int)$min <= 44) ||
        ((int)$min >= 52 && (int)$min <= 52)
        ) $time = (int)$min." minuty";
      else if((int)$min > 1) $time = (int)$min." minut";
      else $time = "1 minuta";
      $color = "rgba(255,0,0,0.75)";
    }
    if($now >= $date) {$time = "Trwa"; $color = "#4cd137";}
    echo  "<div id=\"".$value->getID()."\" class=\"event\" onclick=\"showchat(this)\">".
          "<div class=\"event_pic\"><img src= \"".$value->getPIC()."\"></img></div>".
          "<div class=\"event_label\">".$value->getLABEL()."</div>".
          "<div class=\"event_clock\" style=\"color:".$color.";\"><i class=\"far fa-clock\"></i></div>".
          "<div class=\"event_time\" style=\"color:".$color.";\">".$time."</div></div>";
  }
  echo  "</div></div>".
        "<div class=\"hbtncon\" onclick=\"hidelist(this.parentNode)\">".
        "<div class=\"hideme\"><div class=\"icon\">".
        "<i class=\"fas fa-angle-double-down\"></i></div></div></div>";
}
?>
