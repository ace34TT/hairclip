<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function shoppingCart(): View
    {
        return view('pages.frontoffice.shopping-cart', []);
    }
}
