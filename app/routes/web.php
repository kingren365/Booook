<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminUserHomeController;
use App\Http\Controllers\AdminGoodsController;
use App\Http\Controllers\AdminHistoryController;

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
Route::post('/registerusercomplete',[LoginController::class,'registerComp'])->name('user.register.complete');
Route::get('/',[UserHomeController::class,'home'])->name('user.home');
Route::get('/detailgoods',[UserHomeController::class,'detailGoods'])->name('user.goods.detail');
Route::post('/purchase',[UserHomeController::class,'purchase'])->name('user.purchase');
Route::get('/specialcommerciallaw',[UserHomeController::class,'specialCommercialLaw'])->name('user.special.commercial.law');
Route::get('/passwordresetbefore', [PasswordResetController::class, 'beforeSend'])->name('user.password.reset.before');
Route::post('/passwordresetsendmail', [PasswordResetController::class, 'SendMail'])->name('user.password.reset.send.mail');
Route::get('/passwordresetconfirm', [PasswordResetController::class, 'confirmPassword'])->name('user.password.reset.confirm');
Route::post('/passwordresetcomplete', [PasswordResetController::class, 'completePassword'])->name('user.password.reset.complete');
Route::post('/addcart', [UserHomeController::class, 'addCart'])->name('user.cart.add');
Route::get('/shoppingcart', [UserHomeController::class, 'viewCart'])->name('user.cart.view');
Route::get('/shoppingcartdelete', [UserHomeController::class, 'deleteCart'])->name('user.cart.delete');
Route::post('/shoppingcartregister', [UserHomeController::class, 'purchaseCart'])->name('user.cart.purchase');
Route::middleware('userauth')->group(function () {
    Route::get('/history',[UserHomeController::class,'history'])->name('user.history');
    Route::get('/useraccount',[UserHomeController::class, 'userAcnt'])->name('user.account');
    Route::get('/useraccountedit',[UserHomeController::class, 'userAcntEdit'])->name('user.account.edit');
    Route::post('/useraccountupdate',[UserHomeController::class, 'userAcntUpdate'])->name('user.account.update');
    Route::get('/useraccountdelete',[UserHomeController::class, 'userAcntDelete'])->name('user.account.delete');
    Route::get('/reviewcreate', [UserHomeController::class, 'reviewCreate'])->name('user.review.create');
    Route::post('/reviewstore', [UserHomeController::class, 'reviewStore'])->name('user.review.store');
});


Route::prefix('/admin')->group(function(){
    Route::get('/login',[LoginController::class,'adminLoginform'])->name('admin.login.form');
    Route::post('/login',[LoginController::class,'adminLogin'])->name('admin.login');
    Route::get('/logout',[LoginController::class,'adminLogout'])->name('admin.logout');
    Route::middleware('adminuser')->group(function() {
        Route::get('/',[AdminUserHomeController::class, 'home'])->name('admin.home');
        Route::get('/account',[AdminUserHomeController::class, 'detailAcnt'])->name('admin.account');
        Route::get('/accountedit',[AdminUserHomeController::class, 'editAcnt'])->name('admin.account.edit');
        Route::post('/accountupdate',[AdminUserHomeController::class, 'updateAcnt'])->name('admin.account.update');
        Route::resource('/goods', 'AdminGoodsController');
        Route::get('/history', [AdminHistoryController::class, 'manageHistory'])->name('admin.manage.history');
        Route::get('/userList', [AdminUserHomeController::class, 'userList'])->name('admin.user.list');
        Route::get('/useredit', [AdminUserHomeController::class, 'userEdit'])->name('admin.user.edit');
        Route::post('/userupdate', [AdminUserHomeController::class, 'userUpdate'])->name('admin.user.update');
        Route::get('/userdelete', [AdminUserHomeController::class, 'userDelete'])->name('admin.user.delete');
    });
});
