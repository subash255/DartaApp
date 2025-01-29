<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userdetails;
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

    public function shareholderindex()
    {
        $shareholders=Userdetails::all();
        return view('admin.shareholder.index',compact('shareholders'), [
            'title' => 'Shareholder Index'
        ]);
    }

    public function shareholderdelete($id)
    {
        $shareholder=Userdetails::find($id);
        $shareholder->delete();
        return redirect()->back()->with('success', 'Shareholder deleted successfully!');
    }

    public function viewshareholder($id)
    {
        $shareholder=Userdetails::find($id);
        return view('admin.shareholder.view',compact('shareholder'), [
            'title' => 'Shareholders'
        ]);
    }

}
