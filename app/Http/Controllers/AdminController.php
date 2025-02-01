<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Userdetails;
use App\Models\Visit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalvisits = Visit::sum('number_of_visits');
        $date = \Carbon\Carbon::today()->subDays(30);
        $visitdate = Visit::where('visit_date', '>=', $date)->pluck('visit_date');
        $visits = Visit::where('visit_date', '>=', $date)->pluck('number_of_visits');
        $totalusers = User::where('role', 'user')->count();
        $totalaccepted = User::where('role', 'user')->where('status', 'approved')->count();
        $totalcompanies = Company::count();
        $totalshareholders = Userdetails::count();
        return view(
            'admin.dashboard',
            [
                'title' => 'Dashboard'
            ],
            compact('totalvisits', 'visitdate', 'visits', 'totalusers', 'totalaccepted', 'totalcompanies', 'totalshareholders')
        );
    }
    public function CustomerIndex()
    {
        $customers = User::where('role', 'user')->get();
        return view('admin.customer.index', compact('customers'), [
            'title' => 'Customer Index'
        ]);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function accepted($id)
    {
        $customer = User::findorfail($id);
        $customer->status = 'approved';
        $customer->save();

        return redirect()->back()->with('status', 'Customer approved!');
    }

    public function rejected($id)
    {
        $customer = User::findorfail($id);
        $customer->status = 'rejected';
        $customer->save();

        return redirect()->back()->with('status', 'Customer rejected!');
    }

    public function shareholderindex()
    {
        $shareholders = Userdetails::all();
        return view('admin.shareholder.index', compact('shareholders'), [
            'title' => 'Shareholder Index'
        ]);
    }

    public function shareholderdelete($id)
    {
        $shareholder = Userdetails::find($id);
        $shareholder->delete();
        return redirect()->back()->with('success', 'Shareholder deleted successfully!');
    }

    public function viewshareholder($id)
    {
        $shareholder = Userdetails::find($id);
        return view('admin.shareholder.view', compact('shareholder'), [
            'title' => 'Shareholders'
        ]);
    }
}
