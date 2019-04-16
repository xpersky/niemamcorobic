<?php
function Render_MapPane(){
?>
  <script type="text/javascript">
    var map;
    var clicked = false;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {lat: -34.397, lng: 150.644},
        styles: [
                  {
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#1d2c4d"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#8ec3b9"
                      }
                    ]
                  },
                  {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#1a3646"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative",
                    "stylers": [
                      {
                        "visibility": "simplified"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#4b6878"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#64779e"
                      }
                    ]
                  },
                  {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#4b6878"
                      }
                    ]
                  },
                  {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#334e87"
                      }
                    ]
                  },
                  {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#023e58"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#283d6a"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#6f9ba5"
                      }
                    ]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#1d2c4d"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#023e58"
                      }
                    ]
                  },
                  {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#3C7680"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#304a7d"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#98a5be"
                      }
                    ]
                  },
                  {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#1d2c4d"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#2c6675"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                      {
                        "color": "#255763"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#b0d5ce"
                      }
                    ]
                  },
                  {
                    "featureType": "road.highway",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#023e58"
                      }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "elementType": "labels",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "stylers": [
                      {
                        "visibility": "off"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#98a5be"
                      }
                    ]
                  },
                  {
                    "featureType": "transit",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                      {
                        "color": "#1d2c4d"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.line",
                    "elementType": "geometry.fill",
                    "stylers": [
                      {
                        "color": "#283d6a"
                      }
                    ]
                  },
                  {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#3a4762"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                      {
                        "color": "#0e1626"
                      }
                    ]
                  },
                  {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                      {
                        "color": "#4e6d70"
                      }
                    ]
                  }
                ] ,
        disableDefaultUI: true
      });
      var input = document.getElementById("event_place");
      var autocomplete = new google.maps.places.Autocomplete(input);
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        document.getElementById("lat").value = place.geometry.location.lat();
        document.getElementById("lng").value = place.geometry.location.lng();
      });
      // Try HTML5 geolocation.
      var pos;
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          document.cookie = "lat = " + pos.lat;
          document.cookie = "lng = " + pos.lng;
        map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      }
      else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        }
      // Set markers.
      downloadUrl('../data/eventInfo.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('event');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var url = markerElem.getAttribute('url');
              var terms = markerElem.getAttribute('terms');
              var img = new Image;
              img.crossOrigin = "Anonymous";
              img.src = url;
              img.onload = function() {
              var place = markerElem.getAttribute('place');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
              var marker = new google.maps.Marker({
                position: point,
                map: map,
                title:place,
                icon: createMarker(img)
              });
              marker.set("id", id);
              marker.addListener('click',displayEvent);}
            });
          });

    }
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
    function doNothing() {}
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }
    function createMarker(image) {

        var can = document.createElement("canvas");
        var ctx = can.getContext("2d");
        var tester = document.getElementById("tester");

        tester.appendChild(image);
        tester.style.display = "block";
        let height = tester.childNodes[0].clientHeight;
        let width = tester.childNodes[0].clientWidth;
        tester.style.display = "";

        var fill = ctx.createLinearGradient(0,0,0,80);
        fill.addColorStop(0,"#49c3e6");
        fill.addColorStop(1,"#1cb5e0");

        can.width = 80;
        can.height = 80;

        ctx.beginPath();
        ctx.arc(40, 32, 30, 0.25 * Math.PI, 0.75 * Math.PI,true);
        ctx.lineTo(38,74);
        ctx.arcTo(40,76,42,74,1);
        let xe = 40 + 30 * Math.cos(0.25 * Math.PI);
        let ye = 32 + 30 * Math.sin(0.25 * Math.PI);
        ctx.lineTo(xe,ye);
        ctx.fillStyle = fill;
        ctx.shadowColor = "rgba(0,0,0,0.5)";
        ctx.shadowBlur = 5;
        ctx.shadowOffsetX = 4;
        ctx.shadowOffsetY = 4;
        ctx.fill();
        ctx.closePath();

        ctx.beginPath();
        ctx.arc(40,32,22.5,0,2*Math.PI);
        ctx.closePath();
        ctx.clip();
        ctx.drawImage(image,(40-(width/2)),(32-(height/2)),width,height);
        return can.toDataURL();

       }
    function displayEvent() {
      let id = this.id;
      let pic;
      let terms;
      document.cookie = "CurrEID = " + id;
      document.getElementById("members").childNodes[0].innerHTML = "";
      document.getElementById("terms").childNodes[0].innerHTML = "";
      downloadUrl('../data/eventMem.php?id='+id, function(data) {
            var xml = data.responseXML;
            var members = xml.documentElement.getElementsByTagName('member');
            Array.prototype.forEach.call(members, function(mem) {
              var imie = mem.getAttribute('imie');
              var url = mem.getAttribute('url');
              var age = mem.getAttribute('age');
              var div = document.createElement('div');
              var img = document.createElement('img');
              var imgcon = document.createElement('div');
              img.src = url;
              var label = document.createElement('div');
              let txt = imie + ", " + age;
              var text = document.createTextNode(txt);
              label.setAttribute("class","memberLabel");
              imgcon.setAttribute("class","memPicCon");
              label.appendChild(text);
              div.appendChild(label);
              imgcon.appendChild(img);
              div.appendChild(imgcon);
              div.setAttribute("class","membercon");
              document.getElementById("members").childNodes[0].appendChild(div);
          });
        });
        downloadUrl('../data/eventAdm.php?id='+id, function(data) {
              var xml = data.responseXML;
              var admins = xml.documentElement.getElementsByTagName('tworcy');
              Array.prototype.forEach.call(admins, function(adm) {
                  var admin_imie = adm.getAttribute('imie');
                  var admin_url = adm.getAttribute('url');
                  var admin_age = adm.getAttribute('age');
                  document.getElementById("eADMpic").innerHTML = "<img src=\""+admin_url+"\">";
                  document.getElementById("eADMnam").innerHTML = admin_imie+", "+admin_age;
              });
            });
        downloadUrl('../data/eventDesc.php?id='+id, function(data) {
          var xml = data.responseXML;
          var terms = xml.documentElement.getElementsByTagName('content');
          Array.prototype.forEach.call(terms, function(term) {
              var terms = "<p>"
              terms += term.getAttribute('Terms');
              let remake = terms.replace(/;/g,"</p><p>");
              let result = remake.slice(0,-3);
              document.getElementById("terms").childNodes[0].innerHTML = result;
          });
        });
      let eventPane = document.getElementById("event_pane");
      if(displayedPane == 0){
        let eventBtn = document.getElementById("sbtncon");
        eventBtn.style.bottom = "-10%";
        eventBtn.style.opacity = "0";
        setTimeout(function() {
          eventBtn.style.display = "none";
          show(eventPane);
        },500);
      }
      else if(displayedPane == 1){
        let eventList = document.getElementById("my_event_list");
        hide(eventList);
        setTimeout(show(eventPane),750);
      }
      else if(displayedPane == 2){
        let eventChat = document.getElementById("event_chat");
        eventChat.style.transform = "translate(-50%,-250%)";
        eventChat.style.opacity = "0";
        setTimeout(function() {
          eventChat.style.display = "none";
          show(eventPane);
        },500);
      }
    }
  </script>
<?php
}
?>
