import './bootstrap';
import '../css/app.css';

var map;
var opt;
var mapObj;
var marker;
var google;


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