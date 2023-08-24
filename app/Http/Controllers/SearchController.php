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
    public function search_place(Request $request)
    {
        $api_key = config('app.api_key');
        $apiKey = env('PLACES_API');  // Google Places APIキーを設定
        $lat = $request->input('lat');  // 緯度を設定
        $lon = $request->input('lon'); // 経度を設定
        $search = $request->input('searchWord');  // 検索ワードを設定
        // Google Places APIのURLを構築
        $url = sprintf(
            "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=%s,%s&radius=1500&type=restaurant&keyword=%s&language=ja&key=%s",
            $lat,
            $lon,
            urlencode($search),
            $apiKey
        );
        // cURLを使用してAPIリクエストを送信
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // JSONレスポンスを配列にデコード
        $places = json_decode($response, true)['results'];
        $details = [];
        foreach($places as $place)
        {
            $placeId = $place['place_id'];  // 特定の場所のplace_idを設定
            // Google Places APIのURLを構築
            $url = sprintf(
                "https://maps.googleapis.com/maps/api/place/details/json?place_id=%s&language=ja&key=%s",
                 //"https://maps.googleapis.com/maps/api/place/details/json?place_id=%25s&fields=geometry/location&key=%25s", //座標
                $placeId,
                $apiKey
            );
            // cURLを使用してAPIリクエストを送信
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            // JSONレスポンスを配列にデコード
            $detail = json_decode($response, true)['result'];
            if (isset($detail['geometry']['location'])) {
                $detail['latitude'] = $detail['geometry']['location']['lat'];
                $detail['longitude'] = $detail['geometry']['location']['lng'];
            }
            $details[] = $detail;
        }
        // dd($details);
        return view('myApplication/resutaurant_chart')->with(['details' => $details,'api_key' => $api_key]);
    }
}
