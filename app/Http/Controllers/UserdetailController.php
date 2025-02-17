<?php

namespace App\Http\Controllers;

use App\Models\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserdetailController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $userdetail = Userdetails::where('user_id', $user->id)->get();
        return view('user.userindex', compact('userdetail', 'user'));
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

        return redirect()->route('user.shareholder.step2', $userDetail->id);
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
        return view('user.shareholder.step2', ['currentStep' => 'step2'],  compact('userDetail'));
    }

    public function step2Update(Request $request, $id)
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

        if ($request->hasFile('cimage')) {
            $cimage = $request->file('cimage');
            $cimageName = time() . '.' . $cimage->getClientOriginalExtension(); // Set the file name with current timestamp
            $cimage->move(public_path('citizenship'), $cimageName); // Move image to 'public/citizenship'
            $data['cimage'] =  $cimageName; // Store the path in the database
        }


        if ($request->hasFile('ccimage')) {
            $ccimage = $request->file('ccimage');
            $ccimageName = time() . '.' . $ccimage->getClientOriginalExtension(); // Set the file name with current timestamp
            $ccimage->move(public_path('citizenship'), $ccimageName); // Move image to 'public/images/citizenship'
            $data['ccimage'] =   $ccimageName; // Store the path in the database
        }

        $userDetail = Userdetails::find($id);

        $userDetail->update($data);

        return redirect()->route('user.shareholder.step3', $userDetail->id);
    }

    public function step3($id)
    {
        $userDetail = Userdetails::find($id);
        return view('user.shareholder.step3', ['currentStep' => 'step3'],  compact('userDetail'));
    }

    public function step3Update(Request $request, $id)
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
        return view('user.shareholder.step4', ['currentStep' => 'step4'],  compact('userDetail'));
    }

    public function step4Update(Request $request, $id)
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
        return view('user.shareholder.step5', ['currentStep' => 'step5'],  compact('userDetail'));
    }


    public function step5Update(Request $request, $id)
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
        return view('user.shareholder.step6', ['currentStep' => 'step6'],  compact('userDetail'));
    }

    public function step6Update(Request $request, $id)
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
