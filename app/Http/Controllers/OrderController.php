<?php

namespace App\Http\Controllers;

use App\Mail\Bill;
use App\Models\Order;
use App\Models\OrderDetail;
use Error;
use Exception;
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
        unset($data['carts']);
        Session::put("shipping", json_encode($data));
        return redirect()->route('order.payment');
    }
    public function pay(Request $request)
    {
        $total = request('total');
        try {
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::create([
                "amount" => $total * 100,
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
        try {
            $session = $request->query->all();
            Mail::to("tafinasoa35@gmail.com")->send(new Bill());
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::retrieve($session["payment_intent"],  ['expand' => ['payment_method']]);
            $shippingDetails = json_decode(Session::get("shipping"), true);
            $order = [
                'payment_intent_id' => $paymentIntent->id,
                //
                'customer_first_name' => $shippingDetails["firstname"],
                'customer_last_name' => $shippingDetails["lastname"],
                'customer_emil' =>  $shippingDetails["email"],
                "customer_phone" => $shippingDetails["phone"],
                //
                'shipping_address' => $shippingDetails["shipping_address"],
                "shipping_city" => $shippingDetails["town"],
                "shipping_state" => $shippingDetails["town"],
                "shipping_postal_code" => $shippingDetails["zip_code"],
                //
                'billing_address' =>  $shippingDetails["shipping_address"],
                //
                "quantity" => Cart::count(true),
                "amount" => Cart::total(),
                "shipping" => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $orderDoc = Order::create($order);
            $orderDetails = [];
            foreach (Cart::content() as $key => $cartDetail) {
                $orderDetails[] = [
                    "order_id" => $orderDoc->id, "product_id" => $cartDetail->id, "quantity" => $cartDetail->qty, 'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            OrderDetail::insert($orderDetails);
            Cart::destroy();
            return view("pages.frontoffice.success");
        } catch (Exception $e) {
            dump($e);
        }
    }
}
