<?php

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\users\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('admin',[MainController::class,'index']);
        Route::get('admin/main',[MainController::class,'index'])->name ('admin');

     Route::prefix('menus')->group(function(){

        Route::get('add',[MenuController::class,'create']);
        Route::post('add',[MenuController::class,'store']);
        Route::get('list',[MenuController::class,'index']);
     });

        });

});
