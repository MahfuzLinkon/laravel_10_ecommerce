<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        Cart::add([
            'quantity' => $request->quantity,
            'id' => $product->id,
            'name' =>$product->name,
            'price' => $product->price,
            'attributes' => [$product->image],
        ]);
        cartArray();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}


