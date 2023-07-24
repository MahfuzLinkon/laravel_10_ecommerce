<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.brand.index', [
            'brands' => Brand::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Brand::updateOrCreateBrand($request);
        return redirect()->back()->with('success', 'Brand Crated Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Brand::updateOrCreateBrand($request, $id);
        return redirect()->route('brands.index')->with('success', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image){
            if (file_exists($brand->image)){
                unlink($brand->image);
            }
        }
        $brand->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully!');
    }

    public function status(Brand $brand)
    {
        if ($brand->status == 1){
            $brand->status = 0;
            $message = 'Deactivate Successfully!';
        }else{
            $brand->status = 1;
            $message = 'Activate Successfully!';
        }
        $brand->save();
        return redirect()->back()->with('success', $message);
    }
}
