<?php
// Renders the event chat pane
function Render_EventChatPane($messages,$myID,$leaderID){
  // first open the container of chat
  echo "<div id=\"chat\">";
  echo  "</div>";
  echo  "<input id=\"msgbox\" type=\"text\" maxlength=\"40\"> <div class=\"send\" onclick=\"sendMessage()\"><i class=\"fas fa-reply\"></i></div>";
  echo  "<div class=\"hbtncon\" onclick=\"closechat()\">".
        "<div class=\"hideme\"><div class=\"icon\">".
        "<i class=\"fas fa-angle-double-up\"></i></div></div></div>";
}
?>
