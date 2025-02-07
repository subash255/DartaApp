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
        $company = Company::where('user_id', Auth::id())->where('id',$id)->first();
        return view('user.company.step1', ['currentStep' => 'step1'], compact('company', 'user'));
    }

    public function step1store(Request $request)
    {
        $validatedData = $request->validate([
            'regno' => 'nullable|string|max:255',
            'regdate' => 'nullable|date',
            'pan' => 'nullable|string|max:255',
            'panregdate' => 'nullable|date',
            'vat' => 'nullable|string|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();
       $company = new Company($validatedData);
            $company->save();

            return redirect()->route('user.company.step2',$company->id);

    
    }
    public function step1Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'regno' => 'nullable|string|max:255',
            'regdate' => 'nullable|date',
            'pan' => 'nullable|string|max:255',
            'panregdate' => 'nullable|date',
            'vat' => 'nullable|string|max:255',
        ]);

        $company = Company::find($id);
        $company->update($validatedData);

        return redirect()->route('user.company.step2',$company->id);
    }
    public function step2($id){
       $company=Company::find($id);
        return view('user.company.step2',$company->id, ['currentStep' => 'step2'], compact('company', 'user'));
    }
    public function step2Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tole' => 'nullable|string|max:255',
            'municipality' => 'nullable|string|max:255',
            'ward' => 'nullable|numeric',
            'district' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
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
            'copystep2data'=> 'nullable|string|max:255',
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
    public function step5($id){
        $company=Company::find($id);
        $user = Auth::user();
        return view('user.company.step5',$company->id, ['currentStep' => 'step5'], compact('company', 'user'));
    }
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

        return redirect()->route('user.company.step1',$company->id);
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
