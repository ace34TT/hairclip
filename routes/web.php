<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\Order;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use Revolution\Google\Sheets\Facades\Sheets;

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
    Sheets::sheet('Sheet 1')->append([['3', 'name3', 'mail3']]);
    $values = Sheets::all();
    //
    $data = Products::getWithTopViewPic();
    return view("pages/frontoffice/homepage")->with("products", $data);
})->name("homepage");

// * SHOPPING CART
Route::group(["prefix" => "shopping-cart", "as" => "shopping-cart."], function () {
    Route::get('/', [ShoppingCartController::class, 'shoppingCart'])->name('index');
    Route::get("/{product_id}", [ShoppingCartController::class, "addItem"])->name("add-item")->where('product_id', '[0-9]+');;;
    Route::post("/", [ShoppingCartController::class, "updateItems"])->name("update-items");
    Route::view("/details", "pages/frontoffice/shopping-cart-details")->name("details");
});

// * PAYMENT
Route::group(["prefix" => "payment", "as" => "payment."], function () {
    Route::view('/', 'pages/frontoffice/payment')->name('index');
    Route::post("/", [PaymentCont::class, 'pay']);
    // Route::view("/payment", [ShoppingCartController::class, 'payment'])->name("index");
});

// * ORDER
Route::group(["prefix" => "order", "as" => "order."], function () {
    Route::view("/shipping", "pages/frontoffice/shipping")->name("shipping");;
    Route::post("/shipping", [OrderController::class, "shipping"])->name("set-shipping");
    Route::view('/payment', 'pages/frontoffice/order-payment')->name('payment');
    Route::get("/payment-info", [OrderController::class, 'pay'])->name("do-pay");
    Route::get("/payment/success", [OrderController::class, "success"])->name("payment.success");
});
// * ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/login', 'pages/backoffice/login')->name('login');
    Route::post("/login", [AdminController::class, 'authenticate'])->name("do-login");
    Route::view("/dashboard", "pages/backoffice/dashboard")->name("dashboard");
    Route::get("/orders", [AdminController::class, "orderList"])->name("order-list");
    Route::view("/profile", "pages/backoffice/profile")->name("profile");
    // Route::get("/login", [OrderController::class, 'pay'])->name("do-pay");
});
