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
        dump(Cart::content());
        return view('pages.frontoffice.shopping-cart');
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
        $duplicated = Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === (int) $product_id;
        });
        if ($duplicated->isNotEmpty()) return redirect()->back();
        else {
            $product = Products::getWithTopViewPic($product_id);
            Cart::add($product->id, $product->name, 1, $product->price, ["top_view" => $product->file_name])->associate(Products::class);
            return redirect()->back();
        }
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
}
