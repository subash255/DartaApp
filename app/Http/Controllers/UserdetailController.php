<?php

namespace App\Http\Controllers;

use App\Models\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserdetailController extends Controller
{
    // Display the user detail form (for adding or editing)
    public function userdetail($id = null)
    {
        $authuser = Auth::user();

        // If id is provided, fetch the user details; otherwise, create a new instance for adding
        if ($id) {
            $userdetail = Userdetails::where('user_id', $authuser->id)->where('id', $id)->first();

            // If no record found, abort with a 403 error (security check)
            if (!$userdetail) {
                abort(403, 'Unauthorized action.');
            }
        } else {
            // No id, so create a new instance for adding a user
            $userdetail = new Userdetails();
        }

        return view('user.userdetail', compact('userdetail'));
    }

    // Handle form submission for creating or updating user details
    public function store(Request $request)
    {
        // Validate the incoming form data
        $validatedData = $request->validate([
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'wname' => 'nullable|string|max:255',
            'waddress' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'ctole' => 'nullable|string|max:255',
            'cmunicipality' => 'nullable|string|max:255',
            'cward' => 'nullable|string|max:255',
            'cdistrict' => 'nullable|string|max:255',
            'cprovince' => 'nullable|string|max:255',
            'cctole' => 'nullable|string|max:255',
            'ccmunicipality' => 'nullable|string|max:255',
            'ccward' => 'nullable|string|max:255',
            'ccdistrict' => 'nullable|string|max:255',
            'ccprovince' => 'nullable|string|max:255',
            'ttole' => 'nullable|string|max:255',
            'tmunicipality' => 'nullable|string|max:255',
            'tward' => 'nullable|string|max:255',
            'tdistrict' => 'nullable|string|max:255',
            'tprovince' => 'nullable|string|max:255',
            'citizennumber' => 'nullable|string|max:255',
            'issuedate' => 'nullable|string|max:255',
            'issuedplace' => 'nullable|string|max:255',
            'notarized' => 'nullable|string|max:255',
            'fathername' => 'nullable|string|max:255',
            'mothername' => 'nullable|string|max:255',
            'spousename' => 'nullable|string|max:255',
            'grandfathername' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'optphone' => 'nullable|string|max:255',
            'optemail' => 'nullable|string|max:255',
            'pan' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:255',
            'lawyername' => 'nullable|string|max:255',
            'lawyerphone' => 'nullable|string|max:255',
            'lawyerid' => 'nullable|string|max:255',
            'lawyeridvalid' => 'nullable|string|max:255',
            'shareamt' => 'nullable|string|max:255',
            'shareno' => 'nullable|string|max:255',
            'sharefrom' => 'nullable|string|max:255',
            'shareto' => 'nullable|string|max:255',
            'sharedate' => 'nullable|string|max:255',
            'totalshare' => 'nullable|string|max:255',
            'addshare' => 'nullable|string|max:255',
            'salesofshare' => 'nullable|string|max:255',
            'accno' => 'nullable|string|max:255',
            'bankname' => 'nullable|string|max:255',
            'bankbranch' => 'nullable|string|max:255',
        ]);


        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::id();

        if ($id = $request->id) {
            // Find the existing userdetails record
            $userDetail = Userdetails::where('user_id', Auth::id())->where('id', $id)->first();

            // If no matching record is found, abort with a 403 error
            if (!$userDetail) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            // Update the existing record
            $userDetail->update($validatedData);
            $message = 'Your address details have been updated!';
        } else {
            // If no id is provided, create a new userdetails record
            $userDetail = new Userdetails($validatedData);
            $userDetail->save();
            $message = 'Your address details have been saved!';
        }
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }


        // Redirect back with the appropriate success message
        return redirect('user/userindex')->with('success', $message);
    }
    public function getUserDetail()
    {
        return Userdetails::where('shareholder_id', session('shareholder_id'))->first();
    }
    public function step1($id = null)
    {
        $userId = Auth::id();
        $userDetail = $id ? Userdetails::where([['user_id', $userId], ['id', $id]])->first() : '';
        return view('user.shareholder.step1', ['currentStep' => 'step1'], compact('userDetail'));
    }

    public function step1Store(Request $request)
    {
        $data  = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'wname' => 'nullable|string|max:255',
            'waddress' => 'nullable|string|max:255',
        ]);

        $data['user_id'] = Auth::id();

        $userDetail =  Userdetails::create($data);

        return redirect()->route('user.shareholder.step2',$userDetail->id);
    }


    public function step1Update(Request $request, $id)
    {
        $data  = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'wname' => 'nullable|string|max:255',
            'waddress' => 'nullable|string|max:255',
        ]);

        $userDetail = Userdetails::find($id);
        $userDetail->update($data);
        return redirect()->route('user.shareholder.step2', $userDetail->id);
    }


    public function step2($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step2',['currentStep' => 'step2'],  compact('userDetail'));
    }

    public function step2Update(Request $request,$id)
    {

        $data = $request->validate([
            'ctole' => 'nullable|string|max:255',
            'cmunicipality' => 'nullable|string|max:255',
            'cward' => 'nullable|string|max:255',
            'cdistrict' => 'nullable|string|max:255',
            'cprovince' => 'nullable|string|max:255',
            'cimage' => 'nullable|image|', // Image validation
            'cctole' => 'nullable|string|max:255',
            'ccmunicipality' => 'nullable|string|max:255',
            'ccward' => 'nullable|string|max:255',
            'ccdistrict' => 'nullable|string|max:255',
            'ccprovince' => 'nullable|string|max:255',
            'ccimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'cchanged' => 'nullable|boolean',
        ]);


        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.shareholder.step3', $userDetail->id);
    }

    public function step3($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step3',['currentStep' => 'step3'],  compact('userDetail'));
    }

    public function step3Update(Request $request,$id)
    {
        $data = $request->validate([
            'ttole' => 'nullable|string|max:255',
            'tmunicipality' => 'nullable|string|max:255',
            'tward' => 'nullable|string|max:255',
            'tdistrict' => 'nullable|string|max:255',
            'tprovince' => 'nullable|string|max:255',
            'copystep2data' => 'nullable|boolean',
        ]);

        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.shareholder.step4', $userDetail->id);
    }


    public function step4($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step4',['currentStep' => 'step4'],  compact('userDetail'));
    }

    public function step4Update(Request $request,$id)
    {
        $data = $request->validate([
            'citizennumber' => 'nullable|string|max:255',
            'issuedate' => 'nullable|string|max:255',
            'issuedplace' => 'nullable|string|max:255',
            'notarized' => 'nullable|in:yes,no',
            'fathername' => 'nullable|string|max:255',
            'mothername' => 'nullable|string|max:255',
            'spousename' => 'nullable|string|max:255',
            'grandfathername' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'optphone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'optemail' => 'nullable|string|max:255',
            'pan' => 'nullable|string|max:255',
            'nid' => 'nullable|string|max:255',
        ]);

        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.shareholder.step5', $userDetail->id);
    }
   

    public function step5($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step5',['currentStep' => 'step5'],  compact('userDetail'));
    }
   

    public function step5Update(Request $request,$id)
    {
        $data = $request->validate([
            'shareamt' => 'nullable|string|max:255',
            'shareno' => 'nullable|string|max:255',
            'sharefrom' => 'nullable|string|max:255',
            'shareto' => 'nullable|string|max:255',
            'sharedate' => 'nullable|string|max:255',
            'totalshare' => 'nullable|string|max:255',
            'addshare' => 'nullable|string|max:255',
            'salesofshare' => 'nullable|string|max:255',
            'lawyername' => 'nullable|string|max:255',
            'lawyerphone' => 'nullable|string|max:255',
            'lawyerid' => 'nullable|string|max:255',
            'lawyeridvalid' => 'nullable|string|max:255',
        ]);

        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.shareholder.step6', $userDetail->id);
    }

    public function step6($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step6',['currentStep' => 'step6'],  compact('userDetail'));
    }

    public function step6Update(Request $request,$id)
    {
        $data = $request->validate([
            'accno' => 'nullable|string|max:255',
            'bankname' => 'nullable|string|max:255',
            'bankbranch' => 'nullable|string|max:255',
        ]);

        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.userindex')->with('success', 'Shareholder details saved successfully!');
    }


    public function delete($id)
    {
        // Find the userdetails record
        $userDetail = Userdetails::where('user_id', Auth::id())->where('id', $id)->first();

        // If no matching record is found, abort with a 403 error
        if (!$userDetail) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Delete the userdetails record
        $userDetail->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Shareholder details deleted successfully!');
    }
}
