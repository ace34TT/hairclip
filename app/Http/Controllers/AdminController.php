<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function dashboard()
    {
        $labels = [
            "10-02-2023",
            "11-02-2023",
            "12-02-2023",
            "13-02-2023",
            "14-02-2023",
            "15-02-2023",
            "16-02-2023",
        ];
        $data = [
            11, 0, 5, 4, 15, 20, 4
        ];
        return view("pages/backoffice/dashboard")->with("labels", $labels)->with("data", $data);
    }
    public function orderList()
    {
        $data = Order::all();
        return view('pages/backoffice/order-list')->with('orders', $data);
    }

    public function orderDetails($order_id)
    {
        $orderDetails = DB::table('sheet_data')->where('order_id', '=', $order_id)->get();
        // dd($orderDetails);
        $order = Order::find($order_id);
        // dd($orderDetails);
        return view("pages.backoffice.order-details")->with("order", $order)->with("orderDetails", $orderDetails);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
