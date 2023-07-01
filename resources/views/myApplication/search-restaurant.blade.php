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
         
         
        <form id="searchForm" action="/search">
          @csrf
          <input type="text" id="searchQuery" placeholder="検索キーワードを入力">
          <button type="submit">検索</button>
        </form>
        
        
        <div id="searchResults"></div> 
        
       
        
     
         
                
           

        <!--Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）-->
        <script src='js/map.js'></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&callback=initMap" async defer></script>
    </body>
</html><!DOCTYPE html>
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
         
         
        <form id="searchForm" action="/search">
          @csrf
          <input type="text" id="searchQuery" placeholder="検索キーワードを入力">
          <button type="submit">検索</button>
        </form>
        
        
        <div id="searchResults"></div> 
        
       
        
     
         
                
           

        <!--Google Maps APIの読み込み（keyには自分のAPI_KEYを指定）-->
        <script src='js/map.js'></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{$api_key}}&callback=initMap" async defer></script>
    </body>
</html>