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
    dump(Cart::content());
    return view("pages/frontoffice/homepage")->with("products", $data);
})->name("homepage");

// * SHOPPING CART
Route::group(["prefix" => "shopping-cart", "as" => "shopping-cart."], function () {
    Route::get('/', [ShoppingCartController::class, 'shoppingCart'])->name('index');
    Route::get("/{product_id}", [ShoppingCartController::class, "addItem"])->name("add-item");
    Route::post("/", [ShoppingCartController::class, "updateItems"])->name("update-items");
});

// * PAYMENT
Route::group(["prefix" => "payment", "as" => "payment."], function () {
    Route::view('/payment', 'pages/frontoffice/payment')->name('index');;
    // Route::view("/payment", [ShoppingCartController::class, 'payment'])->name("index");
});
