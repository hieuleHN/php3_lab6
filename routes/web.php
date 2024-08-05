<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});


Route::middleware(AdminMiddleware::class)->group(function(){
    //phải thông qua Middleware tức là đăng nhập mới dc sử dụng những thứ trong này
    Route::get('/list',[LoginController::class, "listAccount"])->name("listAccount");
    
});

//login register
Route::get('/login',[LoginController::class, "login"])->name("login");
Route::post('/login',[LoginController::class, "postLogin"])->name("postLogin");
Route::get('/logout',[LoginController::class, "logout"])->name("logout");
Route::get('/register',[LoginController::class, "register"])->name("register");
Route::post('/register',[LoginController::class, "postRegister"])->name("postRegister");
Route::get('/update{user}',[LoginController::class, "update"])->name("update");
Route::post('/update{user}',[LoginController::class, "postUpdate"])->name("postUpdate");

Route::get('/user/list',[LoginController::class, "user_list"])->name("user_list");
Route::get('/user_update{user}',[LoginController::class, "user_update"])->name("user_update");
