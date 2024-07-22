<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\userpageController;

use App\Http\Controllers\adminPageController;

route::get('/',[userpageController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[HomeController::class,'index'])->middleware('auth','verified');
// change this
route::get('/view_category',[adminPageController::class,'view_category']);

route::post('/add_category',[adminPageController::class,'add_category']);

route::get('/delete_category/{id}',[adminPageController::class,'delete_category']);

route::get('/view_product',[adminPageController::class,'view_product']);

route::post('/add_product',[adminPageController::class,'add_product']);

route::get('/show_product',[adminPageController::class,'show_product']);

route::get('/delete_product/{id}',[adminPageController::class,'delete_product']);

route::get('/update_product/{id}',[adminPageController::class,'update_product']);

route::post('/updateProduct/{id}',[adminPageController::class,'updateProduct']);

route::get('/order',[adminPageController::class,'order']);

route::get('/send_email/{id}',[adminPageController::class,'send_email']);

route::post('/send_user_email/{id}',[adminPageController::class,'send_user_email']);




route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/delivery',[HomeController::class,'delivery']);

route::get('/product_search',[HomeController::class,'product_search']);
