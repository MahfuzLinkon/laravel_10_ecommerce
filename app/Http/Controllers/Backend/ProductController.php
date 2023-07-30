<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index',[
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create',[
            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
            'brands' => Brand::orderBy('name', 'ASC')->where('status', 1)->get(),
            'units' => Unit::orderBy('name', 'ASC')->where('status', 1)->get(),
            'sizes' => Size::orderBy('name', 'ASC')->where('status', 1)->get(),
            'colors' => Color::orderBy('name', 'ASC')->where('status', 1)->get(),
        ]);
    }

    public function subcategory(Request $request)
    {
        $subcategory = SubCategory::where('category_id', $request->category_id)->where('status', 1)->orderBy('name', 'ASC')->get();
        return response()->json($subcategory);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ],[
            'category_id.required' => 'The category field is required.',
            'subcategory_id.required' => 'The subcategory field is required.',
            'brand_id.required' => 'The brand field is required.',
            'unit_id.required' => 'The unit field is required.',
            'size_id.required' => 'The size field is required.',
            'color_id.required' => 'The color field is required.',
        ]);
        Product::updateOrCreateProduct($request);
        return redirect()->back()->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit',[
           'product' => $product,
            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
            'subcategories' => SubCategory::orderBy('name', 'ASC')->where('status', 1)->get(),
            'brands' => Brand::orderBy('name', 'ASC')->where('status', 1)->get(),
            'units' => Unit::orderBy('name', 'ASC')->where('status', 1)->get(),
            'sizes' => Size::orderBy('name', 'ASC')->where('status', 1)->get(),
            'colors' => Color::orderBy('name', 'ASC')->where('status', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ],[
            'category_id.required' => 'The category field is required.',
            'subcategory_id.required' => 'The subcategory field is required.',
            'brand_id.required' => 'The brand field is required.',
            'unit_id.required' => 'The unit field is required.',
            'size_id.required' => 'The size field is required.',
            'color_id.required' => 'The color field is required.',
        ]);
        Product::updateOrCreateProduct($request, $product->id);
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $images = explode(',', $product->image);
        for ($i = 0; $i < count($images); $i++){
            if ($images[$i]){
                if (file_exists($images[$i])){
                    unlink($images[$i]);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully!');
    }

    public function status(Product $product)
    {
        if ($product->status == 1){
            $product->status = 0;
            $message = 'Deactivate Successfully!';
        }else{
            $product->status = 1;
            $message = 'Activated Successfully!';
        }
        $product->save();
        return redirect()->back()->with('success', $message);
    }




}
