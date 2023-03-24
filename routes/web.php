<?php

use App\Http\Controllers\frontend\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\AdressController;
use App\Http\Controllers\backend\productImageController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\productController;

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
//BACKEND

Route::resource('/users', userController::class);
Route::get('/users/{user}/changePassword', [userController::class, 'passwordForm']);
Route::post('/users/{user}/changePassword', [userController::class, 'changePassword']);
Route::resource('/users/{user}/adress', AdressController::class);
Route::resource('/productImages/{product}/images', productImageController::class);
Route::resource('/categories', categoryController::class);
Route::resource('/products', productController::class);

//FRONTEND
Route::get('/',[homeController::class,'index']);
Route::get('/kategori/{categorySlug?}',[homeController::class,'index']);

Route::get('/',[homeController::class,'index']);
Route::get('kategori/{category:slug}', [\App\Http\Controllers\frontend\categoryController::class, 'index']);

//LOGIN
Route::get("/giris", [authController::class, "sinInForm"]);
Route::post("/giris", [authController::class, "sinIn"]);

Route::get("/uye-ol", [authController::class, "sinUpForm"]);
Route::post("/uye-ol", [authController::class, "sinUp"]);
?>
