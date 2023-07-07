<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <form action="/myApplication/record_money" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="name">
                <input type="text" name="record[resutaurant_name]" placeholder="登録する店名を入力" value="{{ old('record.resutaurant_name') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('record.resutaurant_name') }}</p>
            </div>
            <div class="body">
                <textarea name="record[body]" placeholder="登録する内容を入力" value="{{ old('record.body') }}"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('record.body') }}</p>
            </div>
            <div class="category">
                <h3>支払い方法を入力</h3>
                <select name="record[payment_category_id]">
                    @foreach($paymentCategories as $paymentCategory)
                        <option value="{{ $paymentCategory->id }}">{{ $paymentCategory->payment_category_name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>
    </body>
</html>