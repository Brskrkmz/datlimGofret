<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\AdressController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/users', userController::class);
Route::get('/users/{user}/changePassword', [userController::class, 'passwordForm']);
Route::post('/users/{user}/changePassword', [userController::class, 'changePassword']);
Route::resource('/users/{user}/adress', AdressController::class);
Route::resource('/categories', categoryController::class);
Route::resource('/products', productController::class);