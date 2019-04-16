<?php
function Render_UserPane($user){
    // Rendering our user pane ..
    echo  "<div class=\"user_picture\"><img src=\"".$user->getURL()."\"></div>".
          "<div class=\"user_label\">".$user->getName().",".$user->getAge()."</div>".
          "<div id=\"user_s_btn\" class=\"user_story_btn user_button\"><i class=\"fas fa-user\"></i></div>".
          "<div id=\"user_r_btn\" class=\"user_rate_btn user_button\"><i class=\"far fa-star\"></i></div>".
          "<div id=\"user_a_btn\" class=\"user_awards_btn user_button\"><i class=\"fas fa-trophy\"></i></div>".
          "<div class=\"user_data_container\">".
          "<div id=\"user_s_data\" class=\"user_story\"><span>".$user->getStory()."</span><textarea rows=\"4\" cols=\"50\" id=\"usrStory\">".
          "</textarea><i id=\"aplyStory\" class=\"fas fa-check\" onclick=\"setStory()\"></i><i class=\"fas fa-edit\" onclick=\"editStory()\"></i></div>".
          "<div id=\"user_r_data\" class=\"user_rate\"><span>".$user->getRate()."</span></div>".
          "<div id=\"user_a_data\" class=\"user_awards\">".$user->getAwards()."</div></div>".
          "<script type=\"text/javascript\" src=\"../jscontroll/userP.js\"></script>";
}
?>
