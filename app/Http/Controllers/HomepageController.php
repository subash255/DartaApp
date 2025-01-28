<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        return view('user.index',compact('user'));
    }

    public function userdetail()
    {
        return view('user.userdetail');
    }

    public function companydetail()
    {
        return view('user.companydetail');
    }

    // public function submit(Request $request)
    // {
    //     // Validation
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'comments' => 'required|string',
    //     ]);

    //     // Store data in the database
    //     User::create($request->all());

    //     return redirect()->route('form.index')->with('success', 'Form submitted successfully!');
    // }
}
