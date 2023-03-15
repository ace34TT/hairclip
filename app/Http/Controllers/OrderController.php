<?php

namespace App\Http\Controllers;

use App\Mail\Bill;
use App\Models\Order;
use App\Models\OrderDetail;
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
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::create([
                "amount" => 10 * 100,
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
        // try {
        $session = $request->query->all();
        Mail::to("tafinasoa35@gmail.com")->send(new Bill());
        Stripe::setApiKey(env(key: "SK_STRIPE"));
        $paymentIntent = PaymentIntent::retrieve($session["payment_intent"],  ['expand' => ['payment_method']]);
        $shippingDetails = json_decode(Session::get("shipping"), true);
        $order = [
            'payment_intent_id' => $paymentIntent->id,
            'customer_first_name' => $shippingDetails["firstname"],
            'customer_last_name' => $shippingDetails["lastname"],
            'customer_emil' =>  $shippingDetails["email"],
            'shipping_address' => $shippingDetails["address"],
            'billing_address' =>  $shippingDetails["address"],
            "quantity" => Cart::count(true),
            "amount" => Cart::total(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        // dd(Cart::content());
        // dd($order);
        $orderDoc = Order::create($order);
        $orderDetails = [];
        // dd(Cart::content());
        foreach (Cart::content() as $key => $cartDetail) {
            // dump("looping");
            $orderDetails[] = [
                "order_id" => $orderDoc->id, "product_id" => $cartDetail->id, "quantity" => $cartDetail->qty, 'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // dd($orderDetails);
        OrderDetail::insert($orderDetails);
        // } catch (\Exception $e) {
        //     // Handle exception
        //     dump($e);
        //     // return back()->with('error', 'An error occurred while sending the email.');
        // }
    }
}
