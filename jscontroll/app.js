var termNodes = 2;
var displayedPane = 0;
function hide(pane){
  pane.style.transform = "translate(-50%,150%)";
  pane.style.opacity = "0";
  setTimeout(function() {pane.style.display = "none";},550);
}
function hidelist(pane){
  displayedPane = 0;
  hide(pane);
  let btn = document.getElementById("sbtncon");
  btn.style.display = "block";
  setTimeout(function() {
  btn.style.bottom = "4%";
  btn.style.opacity = "1";},500);
}
function hideEvent(pane){
  displayedPane = 0;
  clicked = false;
  pane.style.transform = "translate(150%,-50%)";
  pane.style.opacity = "0";
  setTimeout(function() {pane.style.display = "none";},500);
  let btn = document.getElementById("sbtncon");
  btn.style.display = "block";
  setTimeout(function() {
  btn.style.bottom = "4%";
  btn.style.opacity = "1";},750);
}
function showlist(btn){
  displayedPane = 1;
  btn.style.bottom = "-10%";
  btn.style.opacity = "0";
  let list = document.getElementById("my_event_list");
  setTimeout(function() {show(list); btn.style.display = "none";},500);
}
function show(pane){
  pane.style.display = "block";
  setTimeout(function() {
    pane.style.transform = "translate(-50%,-50%)";
    pane.style.opacity = "1";
  },25);
}
function showchat(pane){
  displayedPane = 2;
  hide(pane.parentNode.parentNode.parentNode);
  document.cookie = "CurrEID = "+pane.id;
  let showpane = document.getElementById("event_chat");
  AJXinsert(showpane,pane.id);
  setTimeout(show(showpane),500);
}
function closechat(){
  displayedPane = 1;
  let chat = document.getElementById("event_chat");
  let events = document.getElementById("my_event_list");
  chat.style.transform = "translate(-50%,-250%)";
  chat.style.opacity = "0";
  setTimeout(function() {chat.style.display = "none";},550);
  setTimeout(show(events),1000);
}
function expandEventTerms(pane){
  if(pane.childNodes[1].childNodes[termNodes - 1].value != ""){
  let input = document.createElement("INPUT");
  input.setAttribute("type","text");
  input.id = "term"+(termNodes);
  input.placeholder = "Warunek";
  input.name = "event_term_"+(termNodes-1);
  pane.childNodes[1].appendChild(input);
  let height = pane.childNodes[1].clientHeight + 35;
  setTimeout(function() {
    if(height <= 280){
    pane.style.height = height + "px";
    setTimeout(function() { pane.childNodes[1].style.height = height + "px"; },250);
    }
  },25);
  let count = document.getElementById("termC");
  count.value = termNodes - 1;
  termNodes++;
  }
}
window.onload = function() {
  var error = document.getElementById("error_handle").value;
  setTimeout(function() {
    let header = document.getElementById("header");
    let content = document.getElementById("container");
    let loader = document.getElementById("loading");
    loader.style.opacity = "0";
    header.style.display = "block";
    content.style.display = "block";
    setTimeout(function() {
      header.style.opacity = "0.75";
      content.style.opacity = "1";
      loader.style.display = "none";
      uniqueName();
    },250);
    setTimeout(function() {
      let btn = document.getElementById("sbtncon");
      btn.style.display = "block";
    setTimeout(function() {
      btn.style.bottom = "4%";
      btn.style.opacity = "1";
      if(error != "") alert(error);
    },500);
    },500);
  },10);

}
document.getElementById("event_chat").onclick = function() {
  let message = this.childNodes[1].childNodes;
  for(let i=1;i<message.length - 1;i++){
    if((event.target).id == message[i].childNodes[1].id){
      message[i].childNodes[1].style.opacity = "1";
      message[i].childNodes[2].style.opacity = "1";
    }
    else {
      message[i].childNodes[1].style.opacity = "0.8";
      message[i].childNodes[2].style.opacity = "0";
    }

  }
}
document.getElementById("event_btn").onclick = function() {
  let userp = document.getElementById("user_pane");
  let evenM = document.getElementById("event_maker");
  let button = this;
  button.style.opacity = "0";
  button.style.transform = "translate(-50%,-150%)";
  userp.style.opacity = "0";
  userp.style.transform = "translate(-175%,-50%)";

  setTimeout(function() {
    button.style.display = "none";
    userp.style.display = "none";
    evenM.style.display = "block";
  },450);

  setTimeout(function() {
    evenM.style.opacity = "1";
    evenM.style.transform = "translate(-50%,-50%)";
  },750);
}
document.getElementById("event_reset").onclick = function() {
  let userp = document.getElementById("user_pane");
  let evenM = document.getElementById("event_maker");
  let evenB = document.getElementById("event_btn");
  let label1 = document.getElementById("label_first");
  let label2 = document.getElementById("label_second");
  let label3 = document.getElementById("label_third");
  let label4 = document.getElementById("label_all");
  label1.style.color = "white";
  label1.style.border = "3px solid white";
  label2.style.color = "white";
  label2.style.border = "3px solid white";
  label3.style.color = "white";
  label3.style.border = "3px solid white";
  label4.style.color = "white";
  label4.style.border = "3px solid white";
  evenM.style.opacity = "";
  evenM.style.transform = "";
  setTimeout(function () {
    evenM.style.display = "";
    evenB.style.display = "";
    userp.style.display = "";
  },500);
  setTimeout(function() {
    evenB.style.opacity = "1";
    evenB.style.transform = "translate(-50%,-50%)";
    userp.style.opacity = "1";
    userp.style.transform = "translate(-50%,-50%)";
  },750);
}
var verifiedTerms = 0;
var verifieddate = 0;
var verifiedplace = 0;
function verifyP(pane){
  if(pane.value == ""){
    pane.placeholder = "Należy wypełnić!";
    pane.classList.add("red_holder");
    pane.style.border = "1px solid #e74c3c";
  }
  else {
    pane.placeholder = "";
    pane.classList.remove("red_holder");
    pane.style.border = "1px solid #4cd137";
    let label = document.getElementById("label_first");
    label.style.color = "#4cd137";
    label.style.border = "3px solid #4cd137";
    verifiedplace = 1;
    if(verifieddate == 1 && verifiedTerms == 1){
      let all = document.getElementById("label_all");
      all.style.color = "#4cd137";
      all.style.border = "3px solid #4cd137";
      document.getElementById("event_submit").disabled = false;
      document.getElementById("event_submit").style.filter = "grayscale(0%)";
    }
  }
}
function verifyT(pane){
  const regex = /^20[0-9]{2}(\/|\.|-)[01][0-9](\/|\.|-)[0123][0-9]\s[012][0-9](\:|\s)[012346][0-9]$/gm;
  if(pane.value == ""){
    pane.placeholder = "Należy wypełnić!";
    pane.classList.add("red_holder");
    pane.style.border = "1px solid #e74c3c";
  }
  else{
    if((regex.exec(pane.value)) !== null){
      pane.placeholder = "";
      pane.classList.remove("red_holder");
      pane.style.border = "1px solid #4cd137";
      let label = document.getElementById("label_second");
      label.style.color = "#4cd137";
      label.style.border = "3px solid #4cd137";
      verifieddate = 1;
      if(verifiedTerms == 1 && verifiedplace == 1){
        let all = document.getElementById("label_all");
        all.style.color = "#4cd137";
        all.style.border = "3px solid #4cd137";
        document.getElementById("event_submit").disabled = false;
        document.getElementById("event_submit").style.filter = "grayscale(0%)";
      }
    }
    else{
      pane.value = "Błąd!";
      pane.style.color = "#e74c3c";
      pane.style.border = "1px solid #e74c3c";
    }
  }
}
function verifyTerms(pane){
  if(pane.value != "") {
    verifiedTerms = 1;
    let label = document.getElementById("label_third");
    label.style.color = "#4cd137";
    label.style.border = "3px solid #4cd137";
    if(verifieddate == 1 && verifiedplace == 1){
      let all = document.getElementById("label_all");
      all.style.color = "#4cd137";
      all.style.border = "3px solid #4cd137";
      document.getElementById("event_submit").disabled = false;
      document.getElementById("event_submit").style.filter = "grayscale(0%)";
    }
  }
}
function clearInput(pane){
  if(pane.value === "Błąd!") pane.value = "";
  pane.classList.remove("red_holder");
  pane.style.border = "1px solid rgba(0,0,0,0.5)";
  pane.style.color = "black";
}
function showMembers(pane){
  let me = pane;
  let him = document.getElementById("sInf");
  let panetoshow = document.getElementById("members");
  let panetohide = document.getElementById("terms");
  me.style.background = "rgba(0,0,0,0.25)";
  him.style.background = "rgba(255,255,255,0)";
  panetoshow.style.transform = "translate(-50%,-50%)";
  panetohide.style.transform = "translate(-150%,-50%)";
}
function showInfo(pane){
  let me = pane;
  let him = document.getElementById("sMem");
  let panetoshow = document.getElementById("terms");
  let panetohide = document.getElementById("members");
  me.style.background = "rgba(0,0,0,0.25)";
  him.style.background = "rgba(255,255,255,0)";
  panetoshow.style.transform = "translate(-50%,-50%)";
  panetohide.style.transform = "translate(50%,-50%)";
}
// UNIQUE NAME TO PREVENET GOOGLE CHROME AUTOCOMPLETE FROM DISPLAYING
function uniqueName(){
  let input = document.getElementById("event_place");
  let hidden = document.getElementById("inputplace");
  let name = "unique"+Math.floor(Math.random() * 1000000);
  input.name = name;
  hidden.value = name;
}
function AJXinsert(pane,id){
  var xmlDoc, x;
  var route = "../data/eventChat.php?id="+id;
  var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
        xmlDoc = xmlHttp.responseXML;
        x = xmlDoc.getElementsByTagName("message");
        let leader = xmlDoc.getElementsByTagName("Leader")[0].childNodes[0].nodeValue;
        let ids = [],uds = [],names = [],urls = [], datas = [], times = [];
        for(let i = 0; i < x.length ; i++){
          ids.push(x[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue);
          uds.push(x[i].getElementsByTagName("UiD")[0].childNodes[0].nodeValue);
          names.push(x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue);
          urls.push(x[i].getElementsByTagName("pic")[0].childNodes[0].nodeValue);
          datas.push(x[i].getElementsByTagName("data")[0].childNodes[0].nodeValue);
          times.push(x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue);
        }
        setChat(leader,ids,uds,names,urls,datas,times);
      }
    }
    xmlHttp.open("GET",route);
    xmlHttp.send();
}
function setChat(leader,id,ud,name,url,data,time){
  let uid = getCookie("UID");
  let chat = document.getElementById("chat");
  let messages = "<div class=\"chat_margin_top\"></div>";
  let selector = "";
  for(let i=0 ; i < id.length ; i++){
    // RENDERING THE BODY OF THE MESSAGE
    messages += "<div class=\"message";
      selector = "";
      if(leader == ud[i]) {
        if(leader == uid) selector += " imboss";
        else selector += " hesboss";
      }
    messages += selector+"\">";
    // ADDING PROFILE PIC
    messages += "<div class=\"chat_pic";
    selector = "";
    if(uid == ud[i]) selector += " my";
    else selector += " other";
    messages += selector+"\"><img src=\""+url[i]+"\"></div>";
    // ADDING DATA
    messages += "<div class=\"data";
    selector = "";
    if(uid == ud[i]) selector += " mine";
    else selector += " their";
    messages += selector+"\">"+data[i]+"</div>";
    // ADDING TIME
    messages += "<div class=\"date";
    selector = "";
    if(uid == ud[i]) selector += " from_me";
    else selector += " to_me";
    messages += selector+"\">"+time[i]+"</div>";
    messages += "</div>";
  }
  messages += "<div class=\"chat_margin_bottom\"></div>";
  chat.innerHTML = messages;
}
function getCookie(cname){
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
    c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function joinTo(){
  let myID = getCookie("UID");
  let eID = getCookie("CurrEID");
  let request = "?UiD="+myID+"&eID="+eID;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
      let xmldoc = xmlHttp.responseXML;
      let message = xmldoc.getElementsByTagName("error")[0].getAttribute("code");
      if(message === "Already have joined.") alert(message);
      else if (message === "noErrors") alert("Joined succesfully!");
    }
  }
  let route = "../data/eventJoin.php"+request;
  xmlHttp.open("GET",route);
  xmlHttp.send();
}
function sendMessage(){
  let myID = getCookie("UID");
  let eID = getCookie("CurrEID");
  mess = document.getElementById("msgbox").value;
  let request = "?UiD="+myID+"&eID="+eID+"&mess="+mess;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
      let xmldoc = xmlHttp.responseXML;
      let message = xmldoc.getElementsByTagName("error")[0].getAttribute("code");
      if(message === "error") alert("Coś poszło nie tak.");
    }
  }
  let route = "../data/chatMess.php"+request;
  xmlHttp.open("GET",route);
  xmlHttp.send();
  let showpane = document.getElementById("event_chat");
  document.getElementById("msgbox").value = "";
  AJXinsert(showpane,eID);
}
var editingStory = 0;
function editStory(){
  if(editingStory == 1){
  document.getElementById("user_s_data").childNodes[0].style.color = "white";
  document.getElementById("usrStory").style.display = "none";
  document.getElementById("aplyStory").style.display = "none";
  editingStory = 0;
  }
  else if(editingStory == 0){
  document.getElementById("user_s_data").childNodes[0].style.color = "rgba(0,0,0,0)";
  document.getElementById("usrStory").style.display = "block";
  document.getElementById("aplyStory").style.display = "flex";
  editingStory = 1;
  }
}
function setStory(){
  let myID = getCookie("UID");
  let story = document.getElementById("usrStory").value;
  let request = "?UiD="+myID+"&story="+story;
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function(){
    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
      let xmldoc = xmlHttp.responseXML;
      let message = xmldoc.getElementsByTagName("error")[0].getAttribute("code");
      if(message === "error") alert("Coś poszło nie tak.");
    }
  }
  let route = "../data/setStory.php"+request;
  xmlHttp.open("GET",route);
  xmlHttp.send();
  location.reload();
}
