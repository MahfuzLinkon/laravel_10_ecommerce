<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
//        if (!Auth::check()){
//            return redirect()->route('login');
//        }
        return view('frontend.pages.checkout');
    }


    public function placeOrder(Request $request)
    {
//        return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'note' => 'required',
            'payment' => 'required',
        ]);

        DB::transaction(function () use ($request){
            $shipping = Shipping::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);
            $payment = Payment::create([
                'user_id' => Auth::user()->id,
                'payment_method' => $request->payment,
                'status' => 'pending',
            ]);

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'shipping_id' => $shipping->id,
                'payment_id' => $payment->id,
                'total' => Cart::getTotal(),
                'status' => 0,
            ]);

            $cartCollection = Cart::getContent();
            foreach ($cartCollection as $item){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_sales_qty' => $item->quantity,
                ]);
            }
        });
        if ($request->payment == 'cash_on_delivery'){
            Cart::clear();
            return view('frontend.pages.payment-success');
        }elseif ($request->payment == 'nagad'){
            Cart::clear();
            return view('frontend.pages.payment-success');
        }
    } // End Method


}
