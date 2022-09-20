<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\publicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CoupanController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;

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


Route::get('/',[publicController::class,'index'])->name('homepage');
Route::get('/category/{cat_id?}',[publicController::class,'index'])->name('filter');

Route::get('/product/{p_id}',[publicController::class,'view'])->name('viewProduct');
Route::get('/cart',[publicController::class,'cart'])->name('cart');
Route::post('/Coupon/apply',[publicController::class,'applyCoupon'])->name('applyCoupon');
Route::get('/Coupon/remove',[publicController::class,'removeCoupon'])->name('removeCoupon');
Route::get('/checkout',[publicController::class,'check'])->name('checkout');
Route::get('/add-to-cart/{p_id}',[publicController::class,'addToCart'])->name('addToCart');
Route::get('/remove-From-cart/{p_id}',[publicController::class,'removeFromCart'])->name('removeFromCart');
Route::get('/remove-item_from-cart/{p_id}',[publicController::class,'removeItemFromCart'])->name('removeitemfromcart');
Route::resource("address",AddressController::class)->only("store");

//admin
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.home');
  
    Route::resources([
        'product'=>ProductController::class,
        'category'=>CategoryController::class,
        'brand'=>BrandController::class,
        'order'=>OrderController::class,
        'payment'=>PaymentController::class,
        'address'=>AddressController::class,
        'coupon'=>CoupanController::class,
        'user'=>UserController::class,
    ]);
   
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
