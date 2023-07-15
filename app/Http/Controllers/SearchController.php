<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    public function index(){

        // .envのAPIキーを変数へ
        $api_key = config('app.api_key');
        return view('myApplication/search-restaurant')->with(['api_key' => $api_key]);
    }
    public function search_place(Request $request){
        function initMap(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function () {
                        $latitube = position.coords.latitude;
                        $longitude = position.coords.longitude;
                    }
                );
            }
        }
        $apiKey = env('PLACES_API');
        $lat = $latitube; //緯度を設定
        $lon = $longitude; //経度を設定
        $search = $request;
        $url = sprintf(
           "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=%s,%s&radius1500&type=restaurant&keyword=%s&key=%s",
            $lat,
            $lon,
            urlencode($search) ,
            $apiKey,
        );
   
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        $results = json_decode($response, true);
        dd($results);
    }
    
    // public function search(Request $request)
    // {
    //     $query = $request->input('query'); // フォームからのクエリを取得

    //     $apiKey = config('app.api_key'); // Google Places APIのAPIキーを設定
    //     $client = new Client();

    //     $response = $client->get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
    //         'query' => [
    //             'key' => $apiKey,
    //             'query' => $query,
    //         ],
    //     ]);

    //     $results = json_decode($response->getBody()->getContents());

    //     // 検索結果をビューに渡して表示
    //     return view('myApplication/search-restaurant')->with(['results' => $results]);
    // }
    
}
