<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// * Global Routes
Route::get('/', [HomeController::class, 'index']);

// * Auth Routes
Route::get('/login', function () {
    return view('Auth.Login');
});
Route::get('/register', function () {
    return view('Auth.Register');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});

// * Inner Pages Routes
Route::get('/ProductDetail/{id}', [ProductController::class, 'detail']);
Route::post('add_to_cart', [ProductController::class, 'AddToCart']);
Route::get('cartList', [ProductController::class, 'cartList']);
Route::get('removeCartItem/{id}', [ProductController::class, 'removeCartItem']);
Route::get('orderNow', [ProductController::class, 'orderNow']);
Route::post('orderPlace', [ProductController::class, 'orderPlace']);
Route::get('orders', [ProductController::class, 'orders']);
Route::post('search', [ProductController::class, 'search']);
