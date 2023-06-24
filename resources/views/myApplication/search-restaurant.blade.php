<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
 
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        

    </head>
    <body>
        <header>
            <b>FooPa</b>
        </header>
        
        <div class='list'>
            <a href=''>お気に入り</a>
            <a href='/myApplication/search_post'>投稿</a>
            <a href='/myApplication/record_money'>記録</a>
        </div>
        
         <div id="map" style="height:300px"></div>
         
        @if($results)
        <ul>
            @foreach($results as $result)
            <li>{{ $result->name }}</li>
            @endforeach
        </ul>
        @else
            <p>検索結果はありません。</p>
        @endif
         <script>
            var map;
                var service;
                var infowindow;
                
                function initMap() {
                  var sydney = new google.maps.LatLng(-33.867, 151.195);
                
                  infowindow = new google.maps.InfoWindow();
                
                  map = new google.maps.Map(
                      document.getElementById('map'), {center: sydney, zoom: 15});
                
                  var request = {
                    query: '飲食店',
                    fields: ['name', 'geometry'],
                  };
                
                  var service = new google.maps.places.PlacesService(map);
                
                  service.findPlaceFromQuery(request, function(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                      for (var i = 0; i < results.length; i++) {
                        createMarker(results[i]);
                      }
                      map.setCenter(results[0].geometry.location);
                    }
                  });
                }
        </script>

        <!--Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）-->
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&callback=initMap" async defer></script>
    </body>
</html>