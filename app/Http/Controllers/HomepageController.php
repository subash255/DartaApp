<?php

namespace App\Http\Controllers;

use App\Models\Userdetails;
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
        $user=Auth::user();
        $userdetail=Userdetails::where('user_id',$user->id)->first();
        return view('user.userdetail',compact('userdetail'));
    }

    public function companydetail()
    {
        return view('user.companydetail');
    }

   
}
