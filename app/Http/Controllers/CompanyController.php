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
    
    

    public function step1($id = null){
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)
        ->when($id, fn($query) => $query->where('id', $id))
        ->first();
        return view('user.company.step1', ['currentStep' => 'step1'], compact('company', 'user'));
    }

    
    public function step2($id = null)
    {
        $user = Auth::user();
        
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
    
        return view('user.company.step2', ['currentStep' => 'step2'], compact('company', 'user'));
    }
    

    public function step2Store(Request $request)
    {
        $validatedData = $request->validate([
            'tole' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'oemail' => 'nullable|string|max:255',

        ]);
        $validatedData['user_id'] = Auth::id();


        $company =  Company::create($validatedData);

        return redirect()->route('user.company.step3',$company->id);
    }

    public function step2Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tole' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'oemail' => 'nullable|string|max:255',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step3',$company->id);
    }
    public function step3($id=null)
    {
        $user = Auth::user();
        
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
    
        // Pass the company and user data as part of the array
        return view('user.company.step3', [
            'company' => $company,
            'user' => $user,
            'currentStep' => 'step3',
        ]);
    }
    
    public function step3Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'houseownername' => 'nullable|string|max:255',
            'hophone' => 'nullable|string|max:15',
            'hopan' => 'nullable|string|max:255',
            'hotole' => 'nullable|string|max:255',
            'homunicipality' => 'nullable|string|max:255',
            'howard' => 'nullable|string|max:255',
            'hodistrict' => 'nullable|string|max:255',
            'hoprovince' => 'nullable|string|max:255',
            'holalpurja' => 'nullable|string|max:255',
            'hotiro'=> 'nullable|string|max:255',
            'lat'=> 'nullable|string|max:255',
            'lng'=> 'nullable|string|max:255',
            'copystep2data'=> 'nullable|boolean|max:255',
        ]);

        if ($request->hasFile('holalpurja')) {
            $holalpurja = $request->file('holalpurja');
            $holalpurjaName = time() . '.' . $holalpurja->getClientOriginalExtension(); // Set the file name with current timestamp
            $holalpurja->move(public_path('documents'), $holalpurjaName); // Move image to 'public/documents'
            $validatedData['holalpurja'] =  $holalpurjaName; // Store the path in the validatedDatabase
        }
       
        
        if ($request->hasFile('hotiro')) {
            $hotiro = $request->file('hotiro');
            $hotiroName = time() . '.' . $hotiro->getClientOriginalExtension(); // Set the file name with current timestamp
            $hotiro->move(public_path('documents'), $hotiroName); // Move image to 'public/images/citizenship'
            $validatedData['hotiro'] =   $hotiroName; // Store the path in the database
        }

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step4',$company->id);
    }
    public function step4($id=null){
        $user = Auth::user();
        
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
        return view('user.company.step4', [
            'company' => $company,
            'user' => $user,
            'currentStep' => 'step4',
        ]);    }

    public function step4Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'accno' => 'nullable|string|max:255',
            'bankname' => 'nullable|string|max:255',
            'bankbranch' => 'nullable|string|max:255',
            'signature' => 'nullable|string|max:255',
            'created' => 'nullable|date',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step5',$company->id);
    }
    public function step5($id=null){
        $user = Auth::user();
        
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
 return view('user.company.step5', [
            'company' => $company,
            'user' => $user,
            'currentStep' => 'step5',
        ]);    }

    public function step5Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cid' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'cpassword' => 'nullable|string|max:255',
            'rid' => 'nullable|string|max:255',
            'rpassword' => 'nullable|string|max:255',
            'remail' => 'nullable|email',
            'rphone' => 'nullable|string|max:15',
            'rcontactperson' => 'nullable|string|max:255',
            'pid' => 'nullable|string|max:255',
            'ppassword' => 'nullable|string|max:255',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step1',$company->id)->with('success', 'Company details created successfully!');
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
