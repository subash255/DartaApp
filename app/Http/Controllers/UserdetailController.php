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
  
 
