<?php

use App\Http\Controllers\ShoppingCartController;
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
    return view("pages/frontoffice/homepage");
})->name("homepage");
// * SHOPPING CART
// Route::controller(ShoppingCartController::class)->group(function () {
//     Route::get('/shopping-cart', function () {
//         return view("pages.frontoffice.shopping-cart");
//     }, ["name" => "shopping-cart"]);
// });
Route::name('shopping-cart.')->group(function () {
    Route::get('/shopping-cart', [ShoppingCartController::class, 'shoppingCart'])->name('');
});
