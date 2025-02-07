<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');
        $companies = Company::query();
    
        if ($status) {
            $companies->where('status', $status);
        }
    
        $companies = $companies->with('user')->get();
    
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

    public function step1store(Request $request)
    {
        $validatedData = $request->validate([
            'regno' => 'required|string|max:255',
            'regdate' => 'required|date',
            'pan' => 'required|string|max:255',
            'panregdate' => 'required|date',
            'vat' => 'required|string|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();
       $company = new Company($validatedData);
            $company->save();

            return redirect()->route('user.company.step2',$company->id);

    
    }
    public function step2($id){
       $company=Company::find($id);
        return view('user.company.step2',$company->id, ['currentStep' => 'step2'], compact('company', 'user'));
    }
    public function step2Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tole' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|numeric',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step3',$company->id);
    }
    public function step3($id){
        $company=Company::find($id);
        $user = Auth::user();
        return view('user.company.step3',$company->id, ['currentStep' => 'step3'], compact('company', 'user'));
    }
    public function step3Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'houseownername' => 'required|string|max:255',
            'hophone' => 'required|string|max:15',
            'hopan' => 'required|string|max:255',
            'hotole' => 'required|string|max:255',
            'homunicipality' => 'required|string|max:255',
            'howard' => 'required|string|max:255',
            'hodistrict' => 'required|string|max:255',
            'hoprovince' => 'required|string|max:255',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step4',$company->id);
    }
    public function step4($id){
        $company=Company::find($id);
        $user = Auth::user();
        return view('user.company.step4',$company->id, ['currentStep' => 'step4'], compact('company', 'user'));
    }
    public function step4Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'accno' => 'required|string|max:255',
            'bankname' => 'required|string|max:255',
            'bankbranch' => 'required|string|max:255',
            'signature' => 'required|string|max:255',
            'created' => 'required|date',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step5',$company->id);
    }
    public function step5($id){
        $company=Company::find($id);
        $user = Auth::user();
        return view('user.company.step5',$company->id, ['currentStep' => 'step5'], compact('company', 'user'));
    }
    public function step5Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cid' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'cpassword' => 'required|string|max:255',
            'rid' => 'required|string|max:255',
            'rpassword' => 'required|string|max:255',
            'remail' => 'required|email',
            'rphone' => 'required|string|max:15',
            'rcontactperson' => 'required|string|max:255',
            'pid' => 'required|string|max:255',
            'ppassword' => 'required|string|max:255',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step1',$company->id);
    }
    
    
 
    public function stores(Request $request)
    {
        // Ensure the 'step' parameter is present in the request
        $step = $request->input('step');
        
        if (empty($step)) {
            return redirect()->route('user.company.step1');  
        }
    
        $validationRules = [
            'step1' => [
                'regno' => 'nullable|string', 
                'regdate' => 'nullable|date', 
                'pan' => 'nullable|string', 
                'panregdate' => 'nullable|date', 
                'vat_pan' => 'required|in:vat,pan', 
            ],
            'step2' => [
                'tole' => 'nullable|string', 
                'municipality' => 'nullable|string', 
                'ward' => 'nullable|string', 
                'district' => 'nullable|string', 
                'province' => 'nullable|string', 
                'phone' => 'nullable|string', 
            ],
            'step3' => [
                'houseownername' => 'nullable|string', 
                'hophone' => 'nullable|string', 
                'hopan' => 'nullable|string', 
                'hotole' => 'nullable|string', 
                'homunicipality' => 'nullable|string', 
                'howard' => 'nullable|string', 
                'hodistrict' => 'nullable|string', 
                'hoprovince' => 'nullable|string', 
            ],
            'step4' => [
                'accno' => 'nullable|string', 
                'bankname' => 'nullable|string', 
                'bankbranch' => 'nullable|string', 
                'signature' => 'nullable|string', 
                'created' => 'nullable|date', 
            ],
            'step5' => [
                'cid' => 'nullable|string', 
                'location' => 'nullable|in:kathmandu,butwal,itahari', 
                'cpassword' => 'nullable|string', 
                'rid' => 'nullable|string', 
                'rpassword' => 'nullable|string', 
                'remail' => 'nullable|email', 
                'rphone' => 'nullable|string', 
                'rcontactperson' => 'nullable|string', 
                'pid' => 'nullable|string', 
                'ppassword' => 'nullable|string', 
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

  public function approved($id)
    {
        $company = Company::find($id);
        $company->status = 'approved';
        $company->save();
        return redirect()->back()->with('success', 'Company approved successfully!');
    }   

    public function rejected($id)
    {
        $company = Company::find($id);
        $company->status = 'rejected';
        $company->save();
        return redirect()->back()->with('success', 'Company rejected successfully!');
    }   
}
