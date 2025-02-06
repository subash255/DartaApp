<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'), [
            'title' => 'Company Details'
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'regno' => 'required|string|max:255',
            'regdate' => 'required|date',
            'pan' => 'required|string|max:255',
            'panregdate' => 'required|date',
            'vat' => 'required|string|max:255',
            'tole' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|numeric',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'oemail' => 'required|email',
            'accno' => 'required|string|max:255',
            'bankname' => 'required|string|max:255',
            'bankbranch' => 'required|string|max:255',
            'signature' => 'required|string|max:255',
            'created' => 'required|date',
            'cid' => 'required|string|max:255',
            'cpassword' => 'required|string|max:255',
            'rid' => 'required|string|max:255',
            'rpassword' => 'required|string|max:255',
            'remail' => 'required|email',
            'rphone' => 'required|string|max:15',
            'rcontactperson' => 'required|string|max:255',

        ]);

        // Add the user ID to the validated data
        $validatedData['user_id'] = Auth::id();

        $userDetail = Company::where('user_id', Auth::id())->first();

        if ($userDetail) {
            // If the user already has an address, update the existing record
            $userDetail->update($validatedData);
            $message = 'Your address details have been updated!';
        } else {
            // If no address exists, create a new record
            $userDetail = new Company($validatedData);
            $userDetail->save();
            $message = 'Your address details have been saved!';
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }
    public function step1(){
        $user = Auth::user();
        $company = Company::where('user_id', Auth::id())->first();
        return view('user.company.step1', ['currentStep' => 'step1'], compact('company', 'user'));
    }
    public function step2(){
        $user = Auth::user();
        $company = Company::where('user_id', Auth::id())->first();
        return view('user.company.step2', ['currentStep' => 'step2'], compact('company', 'user'));
    }
    public function step3(){
        $user = Auth::user();
        $company = Company::where('user_id', Auth::id())->first();
        return view('user.company.step3', ['currentStep' => 'step3'], compact('company', 'user'));
    }
    public function step4(){
        $user = Auth::user();
        $company = Company::where('user_id', Auth::id())->first();
        return view('user.company.step4', ['currentStep' => 'step4'], compact('company', 'user'));
    }
    public function step5(){
        $user = Auth::user();
        $company = Company::where('user_id', Auth::id())->first();
        return view('user.company.step5', ['currentStep' => 'step5'], compact('company', 'user'));
    }

 
    public function stores(Request $request)
    {
        // Ensure the 'step' parameter is present in the request
        $step = $request->input('step');
        
        // Check if step is missing or invalid and set a default
        if (empty($step)) {
            return redirect()->route('user.company.step1');  // Redirect to step1 if no step is provided
        }
    
        // Define validation rules for each step, considering all fields are nullable
        $validationRules = [
            'step1' => [
                'regno' => 'nullable|string', // Nullable string
                'regdate' => 'nullable|date', // Nullable date
                'pan' => 'nullable|string', // Nullable string
                'panregdate' => 'nullable|date', // Nullable date
                'vat' => 'nullable|string', // Nullable string
            ],
            'step2' => [
                'tole' => 'nullable|string', // Nullable string
                'municipality' => 'nullable|string', // Nullable string
                'ward' => 'nullable|string', // Nullable string
                'district' => 'nullable|string', // Nullable string
                'province' => 'nullable|string', // Nullable string
                'phone' => 'nullable|string', // Nullable string
            ],
            'step4' => [
                'accno' => 'nullable|string', // Nullable string
                'bankname' => 'nullable|string', // Nullable string
                'bankbranch' => 'nullable|string', // Nullable string
                'signature' => 'nullable|string', // Nullable string
                'created' => 'nullable|date', // Nullable date
            ],
            'step5' => [
                'cid' => 'nullable|string', // Nullable string
                'cpassword' => 'nullable|string', // Nullable string
                'rid' => 'nullable|string', // Nullable string
                'rpassword' => 'nullable|string', // Nullable string
                'remail' => 'nullable|email', // Nullable email
                'rphone' => 'nullable|string', // Nullable string
                'rcontactperson' => 'nullable|string', // Nullable string
            ],
        ];
    
        // Check if the step exists in the validation rules
        if (!array_key_exists($step, $validationRules)) {
            return redirect()->route('user.company.step1');  // Redirect to step1 if the step is invalid
        }
    
        // Validate the current step's data
        $request->validate($validationRules[$step]);
    
        // Fetch the authenticated user's ID
        $userId = Auth::id(); // Get the currently authenticated user's ID
    
        // Get the data for the current step
        $companyData = $request->all();
        
        // Add user_id to the data being saved to the database
        $companyData['user_id'] = $userId;
    
        // Remove the 'step' field from the data (if exists, it should not be saved)
        unset($companyData['step']);
    
        // Find the existing company record or create a new one if it doesn't exist
        $company = Company::firstOrNew(['user_id' => $userId]);
    
        // Update or create the company record with the current step's data
        $company->fill($companyData);
        $company->save(); // Save the data to the existing company record
    
        // Redirect to the next step
        $nextStep = 'step' . (intval(substr($step, -1)) + 1); // Get the next step dynamically
        if (in_array($nextStep, array_keys($validationRules))) {
            return redirect()->route('user.company.' . $nextStep);
        }
    
        // If it's the last step, go to the success page
        return redirect()->route('user.company.step1')->with('success', 'Company details saved successfully!');
    }
    

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->back()->with('success', 'Company deleted successfully!');
    }
}
