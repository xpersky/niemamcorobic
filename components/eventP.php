<?php
function Render_EventPane(){
  // making the event_pane appear
  echo  "<div id=\"eADMpic\" class=\"picture\"><img src=\"../img/default_profile.png\"></img></div>";
  echo  "<div id=\"eADMnam\" class=\"label\"></div>";
  echo  "<div class=\"dataCON\">";
  echo  "<div id=\"terms\"><span></span></div>";
  echo  "<div id=\"members\"><span></span></div></div>";
  echo  "<div class=\"btnCon\" onclick=\"joinTo()\"><div class=\"btn\"><span>Dołącz</span></div></div>";
  echo  "<div class=\"hbtncon\" onclick=\"hideEvent(this.parentNode)\">".
        "<div class=\"hideme\"><div class=\"icon\">".
        "<i class=\"fas fa-times\"></i></div></div></div>";
  echo  "<div id=\"sMem\" class=\"event_members evnt_btn\" onclick=\"showMembers(this)\"><i class=\"fas fa-user\"></i></div>";
  echo  "<div id=\"sInf\" class=\"event_info evnt_btn\" onclick=\"showInfo(this)\"><i class=\"fas fa-info\"></i></div>";
}
?>
