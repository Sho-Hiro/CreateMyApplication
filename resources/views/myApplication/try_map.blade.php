<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Map</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

        // マップの表示部分
        <div id="map" style="height:500px"></div>
        // マップの表示部分

        <script>
            function initMap() {
                map = document.getElementById("map");
                
                // 東京タワーの緯度、経度を変数に入れる
                let tokyoTower = {lat: 35.6585769, lng: 139.7454506};

                // オプションの設定
                opt = {
                    // 地図の縮尺を指定
                    zoom: 13,

                    // センターを東京タワーに指定
                    center: tokyoTower,
                };

                // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                mapObj = new google.maps.Map(map, opt);

                marker = new google.maps.Marker({
                    // ピンを差す位置を東京タワーに設定
                    position: tokyoTower,

                    // ピンを差すマップを指定
                    map: mapObj,

                    // ホバーしたときに「tokyotower」と表示されるように指定

                    title: 'tokyotower',
                });
            }
        </script>

        // Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&callback=initMap" async defer></script>
    </body>
</html>