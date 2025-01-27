<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function CustomerIndex()
    {
        $customers=User::where('role','user')->get();
        return view('admin.customer.index',compact('customers'));
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
