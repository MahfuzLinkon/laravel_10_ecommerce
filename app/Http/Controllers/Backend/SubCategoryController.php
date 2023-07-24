<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.subcategory.index', [
            'subcategories' => SubCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subcategory.create',[
            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'Category field is required',
            'name.required' => 'Subcategory name field is required',
        ]);
        SubCategory::subcategoryUpdateOrCreate($request);
        return redirect()->back()->with('success', 'Subcategory Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('backend.subcategory.edit',[
            'subCategory' => $subCategory,
            'categories' => Category::orderBy('name', 'ASC')->where('status', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'Category field is required',
            'name.required' => 'Subcategory name field is required',
        ]);

        SubCategory::subcategoryUpdateOrCreate($request, $id);
        return redirect()->route('sub-categories.index')->with('success', 'Subcategory Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->back()->with('success', 'Subcategory Deleted Successfully!');
    }

    public function status(SubCategory $subCategory)
    {
        if ($subCategory->status == 1){
            $subCategory->status = 0;
            $message = 'Subcategory Deactivated';
        }else{
            $subCategory->status = 1;
            $message = 'Subcategory Activated';
        }
        $subCategory->save();
        return redirect()->back()->with('success', $message);
    }
}
