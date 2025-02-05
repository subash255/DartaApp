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
    public function step1(){
        // Retrieve the first Userdetails record where shareholder_id is set
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
    
        // Pass the retrieved user details to the view
        return view('user.shareholder.step1', compact('userdetail'));
    }
    
    public function step2(){
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
        return view('user.shareholder.step2', compact('userdetail'));
        
    }
    public function step3(){
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
        return view('user.shareholder.step3', compact('userdetail'));
    }
    public function step4(){
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
        return view('user.shareholder.step4', compact('userdetail'));
    }
    public function step5(){
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
        return view('user.shareholder.step5', compact('userdetail'));
    }
    public function step6(){
        $userdetail = Userdetails::where('shareholder_id', session('shareholder_id'))->first();
        return view('user.shareholder.step6', compact('userdetail'));
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
    
        // Get the current temporary shareholder ID (if available, otherwise create a new one)
        $shareholderId = session()->get('shareholder_id');
    
        // If no temporary shareholder ID exists, it's a new shareholder
        if (!$shareholderId) {
            // Create a new shareholder ID for this process
            $shareholderId = uniqid('shareholder_', true);
            session()->put('shareholder_id', $shareholderId);
        }
    
        // Now, associate this new data with the correct temporary shareholder
        $shareholderData['user_id'] = $userId; 
        $shareholderData['shareholder_id'] = $shareholderId; // Use temporary shareholder ID
    
        // Check if a record with the same shareholder_id exists. If it does, update it; otherwise, create a new record
        $shareholder = Userdetails::updateOrCreate(
            ['shareholder_id' => $shareholderId],  // Check if this shareholder_id exists
            $shareholderData  // Update the existing data or create new data
        );
    
        // Redirect to the next step dynamically
        if (in_array($nextStep, array_keys($validationRules))) {
            return redirect()->route('user.shareholder.' . $nextStep);
        }
    
        // If it's the last step, redirect to a success page and clear the session
        session()->forget('shareholder_id'); // Clear the temporary shareholder ID after completing the process
        return redirect()->route('user.shareholder.step1')->with('success', 'Shareholder details saved successfully!');
    }
    


}
