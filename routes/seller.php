<?php

use App\Http\Controllers\Seller\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'seller.'],function(){
    
    Route::get('login',[AuthController::class,'showLoginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login.submit');

});





