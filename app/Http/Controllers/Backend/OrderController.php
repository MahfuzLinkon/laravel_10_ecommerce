<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('backend.order.index', [
            'orders' => Order::latest()->get(),
        ]);
    }

    public function show($id)
    {
//        return  Order::with('order_details')->where('id', $id)->first();
        return view('backend.order.details',[
            'order' => Order::with('order_details')->where('id', $id)->first(),
        ]);
    }
}
