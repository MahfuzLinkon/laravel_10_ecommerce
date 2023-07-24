<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
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
        Category::categoryUpdateOrCreate($request);
        return redirect()->back()->with('success', 'Category Created Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.category.edit', [
           'category' => Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Category::categoryUpdateOrCreate($request, $id);
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->image){
            if (file_exists($category->image)){
                unlink($category->image);
            }
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }

    public function status($id)
    {
        $Category = Category::find($id);
        if ($Category->status == 1){
            $Category->status = 0;
            $message = 'Category Deactivated';
        }else{
            $Category->status = 1;
            $message = 'Category Activated';
        }
        $Category->save();
        return redirect()->back()->with('success', $message);
    }
}
