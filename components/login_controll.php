<?php
function Render_LoginScript(){
  ?>
    <script>
    function login_form(login){
      let data = "";
      let opacity = 1;
      data += "<input id=\"fbID\" type=\"text\" placeholder=\"Fb app ID\" name=\"fbID\" required> ";
      data += "<input id=\"fbSEC\" type=\"text\" placeholder=\"Fb app SECRET\" name=\"fbsecret\" required> ";
      data += "<input id=\"gKEY\" type=\"text\" placeholder=\"GoogleMaps Key\" name=\"google\" required> ";
      data += "<input type=\"submit\" value=\"Zapisz\" name=\"login\" class=\"loginbtn\" onclick=\"saveToSession()\">";
      data += "<a href=\"#\" class=\"hdcon\" onclick=\"hide(this.parentNode)\"><i class=\"fas fa-angle-double-up hicon\"></i></a>"
      login.style.color = "rgba(0,0,0,0)";
      login.style.cursor = "auto";
      login.style.transform = "translate(-50%,-25px)scale(1)";
      login.onmouseenter = null;
      login.onmouseleave = null;
      setTimeout(function(){
        login.style.flexDirection = "column";
        login.style.justifyContent = "space-evenly";
        login.innerHTML = "";
        login.style.color = "white";
        login.innerHTML = data;
        login.getElementsByTagName("input")[0].style.display = "block";
        login.getElementsByTagName("input")[1].style.display = "block";
        login.getElementsByTagName("input")[2].style.display = "block";
        login.getElementsByTagName("input")[3].style.display = "block";
        login.getElementsByTagName("a")[0].style.display = "block";
      },250);
      setTimeout(function(){
        login.style.background = "#dcdde1";
        login.style.height = "225px";
        login.getElementsByTagName("input")[0].style.opacity = "1";
        login.getElementsByTagName("input")[1].style.opacity = "1";
        login.getElementsByTagName("input")[2].style.opacity = "1";
        login.getElementsByTagName("input")[3].style.opacity = "1";
        login.getElementsByTagName("a")[0].style.opacity = "1";
      }, 500);
    }
    function hide(login){
      login.getElementsByTagName("input")[0].style.opacity = "0";
      login.getElementsByTagName("input")[1].style.opacity = "0";
      login.getElementsByTagName("input")[2].style.opacity = "0";
      login.getElementsByTagName("input")[3].style.opacity = "0";
      login.getElementsByTagName("a")[0].style.opacity = "0";
      login.style.background = "rgba(0,0,0,0.9)";
      login.style.color = "rgba(0,0,0,0)";
      login.style.height = "50px";
      setTimeout(function(){
        login.style.flexDirection = "";
        login.style.justifyContent = "";
        login.innerHTML = "Konfiguracja &nbsp <i class=\"fas fa-cog\"></i>";
      },250);
      setTimeout(function(){
        login.style.color = "white";
        login.style.cursor = "pointer";
        login.onmouseenter = function() {this.style.background = "#090A0A"; this.style.transform = "translate(-50%,-25px)scale(1.05)";};
        login.onmouseleave = function() {this.style.background = "rgba(0,0,0,0.9)"; this.style.transform = "translate(-50%,-25px)scale(1)";};
        login.onclick = function () {login_form(this); this.onclick = null;};
      },500)
    }
    function saveToSession(){
      let fbID = document.getElementById("fbID").value;
      let fbSEC = document.getElementById("fbSEC").value;
      let gKEY = document.getElementById("gKEY").value;
      let request = "?fbID="+fbID+"&fbSEC="+fbSEC+"&gKEY="+gKEY;
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
          let xmldoc = xmlHttp.responseXML;
          let message = xmldoc.getElementsByTagName("error")[0].getAttribute("code");
          if(message === "error") alert("Coś poszło nie tak.");
        }
      }
      let route = "../data/sessionController.php"+request;
      xmlHttp.open("GET",route);
      xmlHttp.send();
      location.reload();
    }
    </script>
<?php
}
?>
