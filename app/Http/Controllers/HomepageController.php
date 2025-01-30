<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Userdetails;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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