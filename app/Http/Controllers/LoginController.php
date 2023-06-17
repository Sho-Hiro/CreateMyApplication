<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //ログインしたら、serch_resutaurant.blade.phpをかえす。
    public function login(){
        return view('/login/serch_restaurant');
    }
 
}
