<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

    public function viewuser()
    {
        $user=Auth::user();
        $userdetail=Userdetails::where('user_id',$user->id)->get();
        return view('user.userindex',compact('userdetail'));
    }



    public function companydetail()
    {
        $user=Auth::user();
        $company=Company::where('user_id',$user->id)->first();
        return view('user.companydetail',compact('company','user'));
    }

   
}
