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
<<<<<<< HEAD
//BACKEND
=======


>>>>>>> 0180af236c9aaa13919bd9a36c9cdc7dc621b329
Route::resource('/users', userController::class);
Route::get('/users/{user}/changePassword', [userController::class, 'passwordForm']);
Route::post('/users/{user}/changePassword', [userController::class, 'changePassword']);
Route::resource('/users/{user}/adress', AdressController::class);
Route::resource('/productImages/{product}/images', productImageController::class);
Route::resource('/categories', categoryController::class);
Route::resource('/products', productController::class);

<<<<<<< HEAD
//FRONTEND
Route::get('/',[homeController::class,'index']);
Route::get('/kategori/{categorySlug?}',[homeController::class,'index']);
=======
Route::get('/',[homeController::class,'index']);
Route::get('kategori/{category:slug}', [categoryController::class, 'index']);

?>
>>>>>>> 0180af236c9aaa13919bd9a36c9cdc7dc621b329
