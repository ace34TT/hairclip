<?php

namespace App\Http\Controllers;

use App\Mail\Bill;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\StockMovement;
use App\Models\Bill as BillModel;
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
    public function pay()
    {
        $total = request('total');
        $total = $total < 21 ? $total + 1.99 : $total + 4.99;
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
            Stripe::setApiKey(env(key: "SK_STRIPE"));
            $paymentIntent = PaymentIntent::retrieve($session["payment_intent"],  ['expand' => ['payment_method']]);
            $shippingDetails = json_decode(Session::get("shipping"), true);
            $currentDate = now();
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
                "shipping" => Cart::count(true) < 3 ? 1.99 : 4.99,
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ];
            $orderDoc = Order::create($order);
            $orderDetails = [];
            $stockMovements = [];

            foreach (Cart::content() as $key => $cartDetail) {
                $orderDetails[] = [
                    "order_id" => $orderDoc->id, "product_id" => $cartDetail->id, "quantity" => $cartDetail->qty, 'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                ];
                $stockMovements[] = [
                    "product_id" => $cartDetail->id,
                    "quantity" => $cartDetail->qty,
                    "type" => 1,
                    "created_at" => $currentDate,
                    "updated_at" => $currentDate,
                ];
            }
            OrderDetail::insert($orderDetails);
            StockMovement::insert($stockMovements);
            BillModel::create([
                "order_id" => $orderDoc->id,
            ]);
            Mail::to($shippingDetails["email"])->send(new Bill(Cart::total(),  $shippingDetails["lastname"] . " " . $shippingDetails["firstname"], $currentDate, $orderDoc->id, Cart::count(true) < 3 ? 1.99 : 4.99,));
            Cart::destroy();
            return redirect()->route("order.payment.success.page")->with("order_id", $orderDoc->id);
        } catch (Exception $e) {
            dump($e);
        }
    }
}
