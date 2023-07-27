<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.color.index',[
            'colors' => Color::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);
        Color::updateOrCreateColor($request);
        return redirect()->back()->with('success', 'Color Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('backend.color.edit', [
           'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Color::updateOrCreateColor($request, $color->id);
        return redirect()->route('colors.index')->with('success', 'Color Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->back()->with('success', 'Color Deleted Successfully!');
    }

    public function status(Color $color)
    {
        if ($color->status == 1){
            $color->status = 0;
            $message = 'Deactivate Successfully!';
        }else{
            $color->status = 1;
            $message = 'Activate Successfully!';
        }
        $color->save();
        return redirect()->back()->with('success', $message);
    }
}
