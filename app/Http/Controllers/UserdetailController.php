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
            
                // Create a new Address instance and save the validated data
                $address = new Userdetails($validatedData);
                $address->save();
            
                // Redirect back with a success message
                return redirect()->back()->with('success', 'Your address details have been saved!');
            }
            
        }
  
 
