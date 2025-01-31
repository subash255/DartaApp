<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Userdetails;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{
    public function welcome()
    {
        $this->visits();
        return view('welcome');
    }

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


    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }
    
    public function update(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'companyname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(), 
            'phone' => 'required|string|max:15',
            'category' => 'required|string',
            'type' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
    
        $user = User::find(Auth::id());
        $user->update($data);
    
        return redirect()->route('user.index'); 
    }
    
    

    public function companydetail()
    {
        $user=Auth::user();
        $company=Company::where('user_id',$user->id)->first();
        return view('user.companydetail',compact('company','user'));
    }

    //visited people
    public function visits()
    {
        if (!Session::has('visit')) {

            $last_date = Visit::latest('visit_date')->first();
            $visit_date = date('Y-m-d');
            if ($last_date) {
                if ($last_date->visit_date != $visit_date) {
                    $number_of_visits = 1;
                    $d = new Visit();
                    $d->visit_date = $visit_date;
                    $d->number_of_visits = $number_of_visits;
                    $d->save();
                } else {
                    $newvisit = $last_date->number_of_visits + 1;
                    Visit::where('visit_date', $visit_date)->update(['number_of_visits' => $newvisit]);
                }
            } else {
                $number_of_visits = 1;
                $d = new Visit();
                $d->visit_date = $visit_date;
                $d->number_of_visits = $number_of_visits;
                $d->save();
            }
            Session::put('visit', 'yes');
            Session::save();
        }
    }
}