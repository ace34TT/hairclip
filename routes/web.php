<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\Order;
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
    Route::get("/{product_id}", [ShoppingCartController::class, "addItem"])->name("add-item")->where('product_id', '[0-9]+');;;
    Route::post("/", [ShoppingCartController::class, "updateItems"])->name("update-items");
});

// * PAYMENT
Route::group(["prefix" => "payment", "as" => "payment."], function () {
    Route::view('/', 'pages/frontoffice/payment')->name('index');
    Route::post("/", [PaymentCont::class, 'pay']);
    // Route::view("/payment", [ShoppingCartController::class, 'payment'])->name("index");
});

// * ORDER
Route::group(["prefix" => "order", "as" => "order."], function () {
    Route::get("/set-cart", [OrderController::class, "setCart"])->name("set-cart");
    Route::view('/pay', 'pages/frontoffice/order-payment')->name('pay');
    Route::get("/payment-info", [OrderController::class, 'pay'])->name("do-pay");
    Route::get("/payment/success", [OrderController::class, "success"])->name("payment.success");
    // Route::view("/payment/success", "pages/frontoffice/success",)->name("payment.success");
});
// * ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/login', 'pages/backoffice/login')->name('login');
    Route::view("/dashboard", "")->name("dashboard");
    // Route::get("/login", [OrderController::class, 'pay'])->name("do-pay");
});
