<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() : string
    {
        if (Auth::guard('admin')->check()){
            return redirect('/admin/dashboard');
        }
        return view('backend.auth.login');
    }

    public function store(Request $request)
    {
        $attributes =$request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $attributes['status'] = 1;

        if (!Auth::guard('admin')->attempt($attributes)){
            return redirect()->route('admin.login')->with('error', 'Invalid Email Or Password !');
        }
        session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
