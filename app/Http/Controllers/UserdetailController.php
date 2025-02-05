<?php

namespace App\Http\Controllers;

use App\Models\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // Check if an id is passed
    if ($id) {
        // If $id is provided, retrieve the userdetails by id (editing an existing user)
        $userdetail = Userdetails::find($id);

        // Set the session for shareholder_id for editing
        if ($userdetail) {
            session()->put('shareholder_id', $userdetail->shareholder_id);
        }
    } else {
        // If no $id is passed, this means we're adding a new user, so clear any previous session data
        session()->forget('shareholder_id');
        
        // Create a new, empty user detail object for a new user
        $userdetail = new Userdetails(); // Empty, fresh model for a new user
    }

    // Pass the retrieved or new userdetails to the view
    return view('user.shareholder.step1', [
        'currentStep' => 'step1',
        'userdetail' => $userdetail
    ]);
}


public function step2()
{
    // Get the shareholder_id from session
    $shareholderId = session('shareholder_id');

    // Retrieve the user detail based on the shareholder_id from session
    $userdetail = Userdetails::where('shareholder_id', $shareholderId)->first();

    // Return the view for step2
    return view('user.shareholder.step2', ['currentStep' => 'step2'], compact('userdetail'));
}

public function step3()
{
    // Get the shareholder_id from session
    $shareholderId = session('shareholder_id');

    // Retrieve the user detail based on the shareholder_id from session
    $userdetail = Userdetails::where('shareholder_id', $shareholderId)->first();

    // Return the view for step3
    return view('user.shareholder.step3', ['currentStep' => 'step3'], compact('userdetail'));
}

public function step4()
{
    // Get the shareholder_id from session
    $shareholderId = session('shareholder_id');

    // Retrieve the user detail based on the shareholder_id from session
    $userdetail = Userdetails::where('shareholder_id', $shareholderId)->first();

    // Return the view for step4
    return view('user.shareholder.step4', ['currentStep' => 'step4'], compact('userdetail'));
}

public function step5()
{
    // Get the shareholder_id from session
    $shareholderId = session('shareholder_id');

    // Retrieve the user detail based on the shareholder_id from session
    $userdetail = Userdetails::where('shareholder_id', $shareholderId)->first();

    // Return the view for step5
    return view('user.shareholder.step5', ['currentStep' => 'step5'], compact('userdetail'));
}

public function step6()
{
    // Get the shareholder_id from session
    $shareholderId = session('shareholder_id');

    // Retrieve the user detail based on the shareholder_id from session
    $userdetail = Userdetails::where('shareholder_id', $shareholderId)->first();

    // Return the view for step6
    return view('user.shareholder.step6', ['currentStep' => 'step6'], compact('userdetail'));
}



   


    public function stores(Request $request)
    {
        // Ensure the 'step' parameter is present in the request
        $step = $request->input('step');
        
        // Check if step is missing or invalid and set a default
        if (empty($step)) {
            return redirect()->route('user.shareholder.step1');  // Redirect to step1 if no step is provided
        }
    
        // Define validation rules for each step, considering all fields are nullable
        $validationRules = [
            'step1' => [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'wname' => 'nullable|string|max:255',
                'waddress' => 'nullable|string|max:255',
            ],
            'step2' => [
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
            ],
            'step3' => [
                'ttole' => 'nullable|string|max:255',
                'tmunicipality' => 'nullable|string|max:255',
                'tward' => 'nullable|string|max:255',
                'tdistrict' => 'nullable|string|max:255',
                'tprovince' => 'nullable|string|max:255',
            ],
            'step4' => [
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
                'email' => 'nullable|email|max:255',
                'optemail' => 'nullable|string|max:255',
                'pan' => 'nullable|string|max:255',
                'nid' => 'nullable|string|max:255',
            ],
            'step5' => [
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
            ],
            'step6' => [
                'accno' => 'nullable|string|max:255',
                'bankname' => 'nullable|string|max:255',
                'bankbranch' => 'nullable|string|max:255',
            ],
        ];
        
        // Check if the step exists in the validation rules
        if (!array_key_exists($step, $validationRules)) {
            return redirect()->route('user.shareholder.step1');  // Redirect to step1 if the step is invalid
        }
    
        // Validate the current step's data
        $request->validate($validationRules[$step]);
        
        // Get the data for the current step
        $shareholderData = $request->all();
        unset($shareholderData['step']);
        
        // Get the next step dynamically
        $nextStep = 'step' . (intval(substr($step, -1)) + 1); // Get the next step dynamically
    
        // Get the authenticated user ID
        $userId = Auth::id();
    
        // Check if 'id' is passed (for editing) or use session-based `shareholder_id` (for creating new record)
        $shareholderId = $request->input('id') ?? session()->get('shareholder_id');
    
        // If no temporary shareholder ID exists, it's a new shareholder
        if (!$shareholderId) {
            // Create a new shareholder ID for this process
            $shareholderId = uniqid('shareholder_', true);
            session()->put('shareholder_id', $shareholderId);
        }
    
        // If we're editing an existing record, retrieve the current record
        $shareholder = Userdetails::where('shareholder_id', $shareholderId)->first();
        
        if (!$shareholder) {
            // If no existing record, create a new one
            $shareholderData['user_id'] = $userId;
            $shareholderData['shareholder_id'] = $shareholderId; // Use temporary shareholder ID
            $shareholder = Userdetails::create($shareholderData);
        } else {
            // If record exists, update it
            $shareholder->update($shareholderData);
        }
    
        // Redirect to the next step dynamically
        if (in_array($nextStep, array_keys($validationRules))) {
            return redirect()->route('user.shareholder.' . $nextStep);
        }
    
        // If it's the last step, redirect to a success page and clear the session
        session()->forget('shareholder_id'); // Clear the temporary shareholder ID after completing the process
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
