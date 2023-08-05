<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
            'brands' => Brand::orderBy('name', 'ASC')->where('status', 1)->get(),
            'units' => Unit::orderBy('name', 'ASC')->where('status', 1)->get(),
            'sizes' => Size::orderBy('name', 'ASC')->where('status', 1)->get(),
            'colors' => Color::orderBy('name', 'ASC')->where('status', 1)->get(),
            'products' => Product::orderBy('id', 'DESC')->where('status', 1)->limit(10)->get(),
        ]);
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.pages.product-details',[
            'product' => $product,
//            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
            'relatedProduct' => Product::where('category_id', $product->category_id)->where('id', '!=', $id)->where('status', 1)->limit(4)->get(),
        ]);
    }

    public function productCategory($id)
    {
        return view('frontend.pages.product-category',[
            'subcategories' => SubCategory::orderBy('name', 'ASC')->where('status', 1)->get(),
            'brands' => Brand::orderBy('name', 'ASC')->where('status', 1)->get(),
            'products' => Product::where('status', 1)->where('category_id', $id)->limit(12)->get(),
        ]);
    }







}
