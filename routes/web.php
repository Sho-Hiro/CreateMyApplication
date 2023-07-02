<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('myApplication/home');
});
Route::get('/dashboard', function () {
    $api_key = config('app.api_key');
    // return view('dashboard');
    return view('/myApplication/search-restaurant')->with(['api_key' => $api_key]); //ログイン後search-restaurantに移動
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/myApplication/search-restaurant', [PostController::class,'mapApi']);
// Route::get('/search', [SearchController::class, 'search'])->name('search')

Route::get('/myApplication/search_post', [PostController::class,'search_post']);
Route::get('/myApplication/post_create', [PostController::class,'post_create']);
Route::post('/myApplication/search_post', [PostController::class,'post_store']);
Route::get('/myApplication/search_post/{post}', [PostController::class,'post_comment']);
Route::delete('/myApplication/search_post/{post}', [PostController::class,'delete']);
Route::get('/myApplication/record_money', [RecordController::class,'record_money']);
require __DIR__.'/auth.php';
