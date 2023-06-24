<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    public function mapApi(){

        // .envのAPIキーを変数へ
        $api_key = config('app.api_key');
    
        return view('myApplication/search-restaurant')->with(['api_key' => $api_key]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // フォームからのクエリを取得

        $apiKey = 'YOUR_API_KEY'; // Google Places APIのAPIキーを設定
        $client = new Client();

        $response = $client->get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'key' => $apiKey,
                'query' => $query,
            ],
        ]);

        $results = json_decode($response->getBody()->getContents());

        // 検索結果をビューに渡して表示
        return view('search', ['results' => $results->results]);
    }
}