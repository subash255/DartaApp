<?php

namespace App\Http\Controllers;

use App\Models\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserdetailController extends Controller
{
  
        
            // Handle form submission
            public function store(Request $request)
            {
                // Validate the incoming form data
                $validatedData = $request->validate([
                    'firstname' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'wname' => 'nullable|string|max:255',
                    'waddress' => 'nullable|string|max:255',
                    'email' => 'required|email|max:255',
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
            
                // Check if the user already has an address record
                $userDetail = Userdetails::where('user_id', Auth::id())->first();
            
                if ($userDetail) {
                    // If the user already has an address, update the existing record
                    $userDetail->update($validatedData);
                    $message = 'Your address details have been updated!';
                } else {
                    // If no address exists, create a new record
                    $userDetail = new Userdetails($validatedData);
                    $userDetail->save();
                    $message = 'Your address details have been saved!';
                }
            
                // Redirect back with the appropriate success message
                return redirect()->back()->with('success', $message);
            }
            
            
        }
  
 
