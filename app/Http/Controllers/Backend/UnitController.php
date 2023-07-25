<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.unit.index',[
            'units' => Unit::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Unit::updateOrCreateUnit($request);
        return redirect()->back()->with('success', 'Unit Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('backend.unit.edit',[
            'unit' => $unit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Unit::updateOrCreateUnit($request, $unit->id);
        return redirect()->route('units.index')->with('success', 'Unit Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        if ($unit->delete())
            return redirect()->back()->with('success', 'Unit Deleted Successfully!');

    }

    public function status(Unit $unit)
    {
        if ($unit->status == 1){
            $unit->status = 0;
            $message = 'Deactivate Successfully!';
        }else{
            $unit->status = 1;
            $message = 'Activate Successfully!';
        }
        $unit->save();
        return redirect()->back()->with('success', $message);
    }
}
