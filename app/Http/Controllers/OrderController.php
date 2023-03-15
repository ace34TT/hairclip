<?php

namespace App\Http\Controllers;

use Error;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function shipping(Request $request)
    {
        $data = $request->all();
        // dd(Cart::content());
        unset($data['carts']);
        Session::put("shipping", json_encode($data));
        return redirect()->route('order.payment');
    }
    public function pay()
    {
        $items = Cart::content();
        // dd(Cart::total());
        $lineItems = [];
        foreach ($items as $key => $item) {
            $lineItems[] = [
                "price_data" => [
                    'amount' => $item->price * $item->qty,
                    'currency' => 'euro',
                    'product_data' => [
                        "data" => $item->name
                    ],
                    "unit_amount" => $item->price
                ],
                "quantity" => $item->qty,
            ];
        }
        try {
            // retrieve JSON from POST body
            // Create a PaymentIntent with amount and currency
            // dd(Cart::content());
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::create([
                "amount" => 7 * 100,
                'currency' => 'eur',
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            return response()->json($output, 200);
        } catch (Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
    public function success(Request $request)
    {
        dd(Cart::content());
        $session = $request->query->all();

        Mail::to($request->user())->send(new OrderShipped($order));
        Stripe::setApiKey(env(key: "SK_STRIPE"));
        $paymentIntent = PaymentIntent::retrieve($session["payment_intent"],  ['expand' => ['payment_method']]);
    }
}
