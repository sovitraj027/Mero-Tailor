<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\ClothDesignController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\SiteInformationController;
use App\Http\Controllers\TailorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::group(['middleware' => 'admin'], function () {

        Route::resource('categories', CategoryController::class);  
        Route::resource('tailors', TailorController::class);
        Route::resource('colors', ColorController::class);
        Route::resource('clothes', ClothController::class);
        Route::get('cloth/design',[ClothDesignController::class,'clothDesign'])->name('addDesign');
        Route::resource('site-informations', SiteInformationController::class)->except(['destroy', 'show', 'index']);
    });



});
