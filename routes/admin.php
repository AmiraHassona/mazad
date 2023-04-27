<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'admin.'],function(){

    Route::get('login',[AuthController::class,'showLoginForm'])->name('login.form');
    Route::post('login',[AuthController::class,'login'])->name('login.submit');

    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('home',[AuthController::class,'home'])->name('home');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('brands', BrandController::class)->except('show');
        Route::resource('countries', CountryController::class)->except('show');
        Route::resource('products', ProductController::class);
        Route::resource('uploads', UploadController::class)->except('show','edit','update');
    });
});


