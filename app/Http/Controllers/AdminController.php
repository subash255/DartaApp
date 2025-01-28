<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
    public function CustomerIndex()
    {
        $customers=User::where('role','user')->get();
        return view('admin.customer.index',compact('customers'), [
            'title' => 'Customer Index'
        ]);
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function accepted( $id)
    {
        $customer=User::findorfail($id);
        $customer->status = 'approved';
        $customer->save();
    
        return redirect()->back()->with('status', 'Customer approved!');
    }
    
    public function rejected( $id)
    {
        $customer=User::findorfail($id);
        $customer->status = 'rejected';
        $customer->save();
    
        return redirect()->back()->with('status', 'Customer rejected!');
    }
}
