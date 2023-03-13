<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;

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
    public function addItem($product_id)
    {
        // check if item is already in cart
        $duplicated =  Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === $product_id;
        });
        if (!$duplicated->isNotEmpty()) return redirect()->back();
        // if not , insert
        $product = Products::find($product_id);
        Cart::add($product->id, $product->name, 1, $product->price)->associate('Products');
        return redirect()->back();
    }
    public function removeItem(): View
    {
        return view();
    }
    // API
    public function updateItems(Request $request)
    {
        $data = $request->all();
        Session::put("shopping-cart", $data);
        return response()->json([
            'message' => 'User created successfully',
            "data" => $data,
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
