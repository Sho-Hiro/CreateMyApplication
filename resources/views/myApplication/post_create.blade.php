<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/myApplication/search_post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="title">
                <input type="text" name="post[title]" placeholder="タイトルを入力（50字以内）" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <textarea name="post[body]" placeholder="本文を入力（最大3000文字以内）" value="{{ old('post.bocy') }}"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
                <h2>お店のジャンル</h2>
                <select name="post[post_category_id]">
                    @foreach($postCategories as $postCategory)
                        <option value="{{ $postCategory->id }}">{{ $postCategory->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/myApplication/search_post">戻る</a>
        </div>
    </body>
</html>