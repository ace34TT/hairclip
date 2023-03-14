<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        return view('pages.frontoffice.shopping-cart');
    }

    public function addItem($product_id)
    {
        $duplicated = Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === (int) $product_id;
        });
        if ($duplicated->isNotEmpty()) return redirect()->back();
        $product = Products::getWithTopViewPic($product_id);
        Cart::add($product->id, $product->name, 1, $product->price, ["top_view" => $product->file_name])->associate(Products::class);
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
        $updated_cart_items = json_decode($data["updated_data"]);
        foreach ($updated_cart_items as $key => $cart_item) {
            Cart::update($cart_item->rowId, (int)$cart_item->quantity);
        }
        return redirect()->route('order.pay');
    }
}
