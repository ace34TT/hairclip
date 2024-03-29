<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        return view('pages.frontoffice.shopping-cart');
    }

    public function addItem($product_id, $quantity)
    {
        $duplicated = Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === (int) $product_id;
        });
        if ($duplicated->isNotEmpty()) {
            Cart::update($duplicated->first()->rowId, $duplicated->first()->qty + $quantity); // Will update the quantity
            return redirect()->back();
        }
        $product = Products::findOneWithTopView($product_id);
        Cart::add($product->id, $product->name, $quantity, $product->price, ["top_view" => $product->file_name])->associate(Products::class);
        Session::flash('success', 'Form submitted successfully.');
        return redirect()->back();
    }
    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
    // API
    public function updateItems(Request $request)
    {
        $data = $request->all();
        $updated_cart_items = json_decode($data["updated_data"]);
        // dump($updated_cart_items);
        // dump(Cart::content());
        // dump(Cart::total());
        foreach ($updated_cart_items as $key => $cart_item) {
            Cart::update($cart_item->rowId, (int)$cart_item->quantity);
        }
        // dump(Cart::total());
        return redirect()->route('order.shipping');
    }
}
