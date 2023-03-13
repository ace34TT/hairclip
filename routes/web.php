<?php

use App\Http\Controllers\ShoppingCartController;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// * HOMEPAGE
Route::get('/', function () {
    $data = Products::getWithTopViewPic();
    // Cart::destroy();
    dump(Cart::content());
    return view("pages/frontoffice/homepage")->with("products", $data);
})->name("homepage");
// * SHOPPING CART
Route::name('shopping-cart.')->group(function () {
    Route::get('/shopping-cart', [ShoppingCartController::class, 'shoppingCart'])->name('');
    Route::get("/shopping-cart/{product_id}", [ShoppingCartController::class, "addItem"])->name("add-item");
    Route::post("shopping-cart/update", [ShoppingCartController::class, "updateCart"])->name("update-cart");
});
