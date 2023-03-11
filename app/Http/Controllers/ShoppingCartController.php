<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        if (Session::has("shopping-cart")) {
            $cartItems = Session::get("shopping-cart");
            return view('pages.frontoffice.shopping-cart')->with("cart_items", $cartItems);
        }
        return view('pages.frontoffice.shopping-cart')->with("cart_items", []);
    }
    /*
        shopping cart item will be stored as an array in both session and cookies
         [ ['productId' => productId, 'quantity' => quantity] ,
         ['productId' => productId, 'quantity' => quantity] ,
         ....
        ];
    */
    public function addItem($product_id, $quantity)
    {
        // init session if not initialized
        $this->checkShoppingCart();
        //
        $cartItems = Session::get("shopping-cart");
        array_push($cartItems, ["product_id" => $product_id, "quantity" => $quantity]);
        Session::put("shopping-cart", $cartItems);
        return redirect()->back();
    }
    public function removeItem(): View
    {
        return view();
    }
    public function updateItem(): View
    {
        return view();
    }
    private function checkShoppingCart()
    {
        if (Session::exists("shopping-cart")) {
            return;
        }
        Session::put("shopping-cart", []);
    }
}
