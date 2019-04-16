var animated = 0;
document.getElementById("user_s_btn").onclick = swipe1;
document.getElementById("user_r_btn").onclick = swipe2;
document.getElementById("user_a_btn").onclick = swipe3;
function swipe1() {
  document.getElementById("user_s_btn").style.background = "rgba(0,0,0,0.25)";
  document.getElementById("user_r_btn").style.background = "rgba(255,255,255,0)";
  document.getElementById("user_a_btn").style.background = "rgba(255,255,255,0)";
  document.getElementById("user_a_data").style.transform = "translate(150%,-50%)";
  document.getElementById("user_r_data").style.transform = "translate(+50%,-50%)";
  document.getElementById("user_s_data").style.transform = "translate(-50%,-50%)";
}
function swipe2() {
  document.getElementById("user_r_btn").style.background = "rgba(0,0,0,0.25)";
  document.getElementById("user_s_btn").style.background = "rgba(255,255,255,0)";
  document.getElementById("user_a_btn").style.background = "rgba(255,255,255,0)";
  document.getElementById("user_a_data").style.transform = "translate(50%,-50%)";
  document.getElementById("user_s_data").style.transform = "translate(-150%,-50%)";
  document.getElementById("user_r_data").style.transform = "translate(-50%,-50%)";
  if(animated == 0){
  let rate = parseFloat(document.getElementById("user_r_data").childNodes[0].innerHTML);
  let riserate = 0;
  let text = document.getElementById("user_r_data").childNodes[0];
  text.innerHTML = riserate;
  let animate = setInterval(function() {
    if(riserate > rate) clearInterval(animate);
    else{
      riserate = riserate + 0.01;
      text.innerHTML = riserate.toFixed(1);
    }
  },9);
  animated = 1;
  }
}
function swipe3() {
 document.getElementById("user_a_btn").style.background = "rgba(0,0,0,0.25)";
 document.getElementById("user_r_btn").style.background = "rgba(255,255,255,0)";
 document.getElementById("user_s_btn").style.background = "rgba(255,255,255,0)";
 document.getElementById("user_s_data").style.transform = "translate(-250%,-50%)";
 document.getElementById("user_r_data").style.transform = "translate(-150%,-50%)";
 document.getElementById("user_a_data").style.transform = "translate(-50%,-50%)";
}
