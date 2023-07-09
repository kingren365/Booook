<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserHomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[LoginController::class,'loginform'])->name('user.login.form');
Route::post('/login',[LoginController::class,'login'])->name('user.login');
Route::get('/logout',[LoginController::class,'logout'])->name('user.logout');
Route::get('/registeruser',[LoginController::class,'register'])->name('user.register');
ROute::post('/registerusercomplete',[LoginController::class,'registerComp'])->name('user.register.complete');
Route::get('/',[UserHomeController::class,'home'])->name('user.home');
Route::get('/detailgoods',[UserHomeController::class,'detailGoods'])->name('user.goods.detail');
