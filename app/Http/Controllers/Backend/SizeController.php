<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.size.index', [
            'sizes' => Size::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Size::updateOrCreateZize($request);
        return redirect()->back()->with('success', 'Size Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit', [
           'size' => $size,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Size::updateOrCreateZize($request, $size->id);
        return redirect()->route('sizes.index')->with('success', 'Size Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->back()->with('success', 'Deleted Successfully!');
    }

    public function status(Size $size)
    {
        if ($size->status == 1){
            $size->status = 0;
            $message = 'Deactivate Successfully!';
        }else{
            $size->status = 1;
            $message = 'Activate Successfully!';
        }
        $size->save();
        return redirect()->back()->with('success', $message);
    }
}
