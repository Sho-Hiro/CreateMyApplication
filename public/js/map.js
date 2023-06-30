var service;
var infowindow;
var google;
var createMarker;
var navigator;


let map, infoWindow;

function initMap() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          var current_lat=position.coords.latitude;
          var current_lng=position.coords.longitude;
        },
       
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  map = new google.maps.Map(document.getElementById("map"), {
    
    center: { lat:0, lng: 0 },
    zoom: 13,
  });
  infoWindow = new google.maps.InfoWindow();
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

window.initMap = initMap;

