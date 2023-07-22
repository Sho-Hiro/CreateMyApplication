var service;
var infowindow;
var google;
var createMarker;
var navigator;
let map, infoWindow;


if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
          position => {
              const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
              };
              document.getElementById('latitude').value = pos.lat;
              document.getElementById('longitude').value = pos.lng;
          },
          () => {
              handleLocationError(true);
          }
      );
  } else {
      // Browser doesn't support Geolocation
      handleLocationError(false);
  }
  function handleLocationError(browserHasGeolocation){
      document.getElementById('error-message').innerHTML =
          browserHasGeolocation
              ? "エラー: Geolocation サービスに失敗しました。"
              : "エラー: お使いのブラウザはGeolocationをサポートしていません。"
  }
   function initMap() {
    var maps = document.querySelectorAll('.map');
    maps.forEach(function(mapElem) {
        var lat = parseFloat(mapElem.dataset.lat);
        var lng = parseFloat(mapElem.dataset.lng);
        var location = { lat: lat, lng: lng };
        var map = new google.maps.Map(mapElem, {
            zoom: 14,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    });
}
//   function initMap() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(
//       function (position) {
//         // LatLngは中心を指定するクラス
//         let message1 = document.getElementById('latitude');
//         let latitude = parseFloat(message1.getAttribute('data-message'));;
       
//         let message2 = document.getElementById('longitude');
//         let longitude = parseFloat(message2.getAttribute('data-message'));;
       
//         const latlng = new google.maps.LatLng(latitude, longitude); //中心の緯度, 経度

//         // new google.maps.Map で新規マップ作成
//         // オプションでズームとか真ん中とか設定できる
//         const map = new google.maps.Map(document.getElementById("map"), {
//           zoom: 14, //ズームの調整
//           center: latlng, // 中心の設定
//         });

//         // 地図上の赤いマーカーの場所
//         new google.maps.Marker({
//           position: latlng,
//           map: map,
//         });
       
//       },
//       function (error) {
//         alert("エラーです！");
//       }
//     );
//   } else {
//     alert("このブウラウザは位置情報に対応していません。");
//   }
// }

//Maps JavaScript API
// function initMap() {
//     var maps = document.querySelectorAll('.map');
//     maps.forEach(function(mapElem) {
//         var lat = parseFloat(mapElem.dataset.lat);
//         var lng = parseFloat(mapElem.dataset.lng);
//         var location = { lat: lat, lng: lng };
//         var map = new google.maps.Map(mapElem, {
//             zoom: 14,
//             center: location
//         });
//         var marker = new google.maps.Marker({
//             position: location,
//             map: map
//         });
//     });
// }