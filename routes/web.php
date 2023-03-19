<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingCartController;
use App\Models\Products;
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
    return view("pages/frontoffice/homepage")->with("products", $data);
})->name("homepage");

Route::get("/product-overview/{product_id}", function ($product_id) {
    $data = Products::getWithTopViewPic($product_id);
    $colors = Products::getWithTopViewPic();
    return view("pages.frontoffice.product-overview")->with("product", $data)->with("colors", $colors);
})->name("product-overview");


// * SHOPPING CART
Route::group(["prefix" => "shopping-cart", "as" => "shopping-cart."], function () {
    Route::get('/', [ShoppingCartController::class, 'shoppingCart'])->name('index');
    Route::get("/{product_id}/{quantity?}", [ShoppingCartController::class, "addItem"])->name("add-item")->where('product_id', '[0-9]+');;;
    Route::get('/remove/{rowId}', [ShoppingCartController::class, "removeItem"])->name("remove-item");
    Route::post("/", [ShoppingCartController::class, "updateItems"])->name("update-items");
    Route::view("/details", "pages/frontoffice/shopping-cart-details")->name("details");
});

// * PAYMENT
Route::group(["prefix" => "payment", "as" => "payment."], function () {
    Route::view('/', 'pages/frontoffice/payment')->name('index');
    Route::post("/", [PaymentCont::class, 'pay']);
});

// * ORDER
Route::group(["prefix" => "order", "as" => "order."], function () {
    Route::view("/shipping", "pages/frontoffice/shipping")->name("shipping");;
    Route::post("/shipping", [OrderController::class, "shipping"])->name("set-shipping");
    Route::view('/payment', 'pages/frontoffice/order-payment')->name('payment');
    Route::get("/payment-info", [OrderController::class, 'pay'])->name("do-pay");
    Route::get("/payment/success", [OrderController::class, "success"])->name("payment.success");
    Route::view("/payment/success-page", "pages.frontoffice.success")->name("payment.success.page");
});
// * ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Login
    Route::view('/login', 'pages/backoffice/login')->name('login');
    Route::post("/login", [AdminController::class, 'authenticate'])->name("do-login");
    Route::get("/dashboard", [AdminController::class, "dashboard"])->name("dashboard");
    // Orders
    Route::get("/orders", [AdminController::class, "orderList"])->name("order-list");
    Route::get("/order-details/{order_id}", [AdminController::class, "orderDetails"])->name("order-details");
    Route::view("/profile", "pages/backoffice/profile")->name("profile");
    // Stock
    Route::get("/stock-availability", [AdminController::class, "stockAvailability"])->name("sock-availability");
    Route::post("/restock", [AdminController::class, "restock"])->name("restock");
    Route::get("/stock-movements", [AdminController::class, "stockMovements"])->name("stock-movements");
    // Logout
    Route::get("/logout", [AdminController::class, "logout"])->name("logout");
});
