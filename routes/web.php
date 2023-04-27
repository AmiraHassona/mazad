<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'] )->name('home');



Route::get('/website', function () {
    return view('website.index');
});

Route::get('/blog_details', function () {
    return view('website.blog-details');
});

Route::get('/blog', function () {
    return view('website.blog');
});

Route::get('/ckeckout', function () {
    return view('website.check-out');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/product', function () {
    return view('website.product');
});

Route::get('/shop', function () {
    return view('website.shop');
});

Route::get('/cart', function () {
    return view('website.shopping-cart');
});
Route::get('/login', function () {
    return view('website.auth.login');
});

Route::get('/register', function () {
    return view('website.auth.register');
});

