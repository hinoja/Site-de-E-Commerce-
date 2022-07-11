<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/boutique',[ProductController::class,'index'])->name('products.index');
Route::get('/boutique/{slug}',[ProductController::class,'show'])->name('products.show');
Route::get('/panier',[CartController::class,'index'])->name('cart.index');

//Cart Route//
Route::delete('/panier/{rowId}',[CartController::class,'destroy'])->name('cart.delete');
Route::post('/panier/ajouter',[CartController::class,'store'])->name('cart.store');
Route::get('/viderPanier',function(){
    // Cart::destroy();
});

// route to checkout
// Route::get('Paiement',[CheckoutController::class,'checkout'])->name('checkout.index');
// Route::get('stripe/payement',[CheckoutController::class,'afterPayment'])->name('checkout.afterPayment');

Route::get('checkout',[CheckoutController::class,'checkout'])->name('checkout.index');
Route::post('checkout',[CheckoutController::class,'afterPayment'])->name('checkout.afterPayment');
