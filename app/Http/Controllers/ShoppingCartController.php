<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        if (Session::has("shopping-cart")) {
            $cartItems = Session::get("shopping-cart");
            dump(Session::all());
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
        return redirect()->back();
    }
    public function removeItem(): View
    {
        return view();
    }
    // API
    public function updateItems(Request $request)
    {
        // init session if not initialized
        $this->checkShoppingCart();
        $data = $request->all();
        $currentData = Session::get("shopping-cart");
        $allSessionData = Session::all();
        Session::put("shopping-cart", $data);
        return response()->json([
            'message' => 'User created successfully',
            "data" => $data,
            "current_data" => $currentData,
            "all_session_data" => $allSessionData
        ], 201);
    }
    // helper functions
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
