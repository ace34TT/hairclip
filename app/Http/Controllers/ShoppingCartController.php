<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        if (Session::has("shopping-cart")) {
            $cartItems = Session::get("shopping-cart");
            dump($cartItems);
            $data = [];
            $ids = [];
            foreach ($cartItems as $cartItem) {
                $data[] = ['id' => $cartItem['product_id'], 'name' => $cartItem['quantity']];
                $ids[] = $cartItem['product_id'];
            }
            $data = Products::getShoppingCartItem($ids);
            // Session::put("shopping-cart", []);
            return view('pages.frontoffice.shopping-cart')->with("cart_items", $data);
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
        !$this->checkIfItemExists($cartItems, $product_id) ? array_push($cartItems, ["product_id" => $product_id, "quantity" => $quantity]) : null;
        Session::put("shopping-cart", $cartItems);
        // dump($cartItems);
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
    //
    private function checkShoppingCart()
    {
        if (Session::exists("shopping-cart")) {
            return;
        }
        Session::put("shopping-cart", []);
    }
    private function checkIfItemExists($items, $key)
    {
        foreach ($items as $item) {
            if ($item["product_id"] === $key) return true;
        }
        return false;
    }
}
