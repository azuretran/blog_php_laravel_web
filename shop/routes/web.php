<?php

use App\Http\Services\UploadService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\users\MainController;
use App\Http\Controllers\Admin\Users\LoginController;

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('admin',[MainController::class,'index']);
        Route::get('admin/main',[MainController::class,'index'])->name ('admin');
        #menu
     Route::prefix('menus')->group(function(){

        Route::get('add',[MenuController::class,'create']);
        Route::post('add',[MenuController::class,'store']);
        Route::get('list',[MenuController::class,'index']);
        Route::get('edit/{menu}',[MenuController::class,'show']);
        Route::post('edit/{menu}',[MenuController::class,'update']);
        Route::delete('destroy',[MenuController::class,'destroy']);
     });
     #product
     Route::prefix('product')->group(function(){
        Route::get('add',[ProductController::class,'create']);
        Route::post('add',[ProductController::class,'store']);


     });
     #uploaded
     Route::post('upload/services',[UpdateController::class,'store']);


    });

});
