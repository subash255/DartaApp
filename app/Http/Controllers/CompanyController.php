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
        $users = Auth::user();
       
        if($users->role=='admin'){
            
            $company = Company::where('id', $id)->first();
            $user = $company->user;
            return view('admin.company.step1', ['currentStep' => 'step1'], compact('company', 'user'));
        }
        else{
            $user = Auth::user();
        $company = Company::where('user_id', $users->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
        return view('user.company.step1', ['currentStep' => 'step1'], compact('company', 'user'));
        }
    }
    
    public function step1store(Request $request){

        $user = Auth::user();


        $company =  Company::create([
            'user_id' => $user->id,
        ]);
        if(Auth::user()->role=='admin'){
            return redirect()->route('admin.company.step1',$company->id);
        }
        else{
       
        
        return redirect()->route('user.company.step2',$company->id);

        }
    }
    public function step1update(Request $request, $id)
    {
        if(Auth::user()->role=='admin'){
            $validatedData = $request->validate([
               'regno' => 'nullable|string|max:255',
                'regdate' => 'nullable|string|max:255',
                'pan' => 'nullable|string|max:255',
                'panregdate'=>'nullable|string|max:255',
                'vat_pan' => 'nullable|string|max:255',
            ]);
            $company = Company::findOrFail($id); 
            $company->update($validatedData);
            return redirect()->route('admin.company.step2', $company->id);}
        else{


        $company = Company::findOrFail($id); 
    
        $company->update([
            'user_id' => auth::id(),
                ]);
    
        return redirect()->route('user.company.step2', $company->id);
            }
    }


    
    public function step2($id = null)
    {
        $user = Auth::user();
        
        // If no ID is provided, fetch the first company of the user
      
        if($user->role=='admin'){
            $company = Company::where('id', $id)->first();
            $user = $company->user;
            return view('admin.company.step2', ['currentStep' => 'step2'], compact('company', 'user'));
        }
        else{
            $company = Company::where('id', $id)
            ->when($id, fn($query) => $query->where('id', $id))
            ->first();
    
        return view('user.company.step2', ['currentStep' => 'step2'], compact('company', 'user'));
        }
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

        if(Auth::user()->role=='admin'){
            return redirect()->route('admin.company.step3',$company->id);
        }
        else{

        return redirect()->route('user.company.step3',$company->id);
        }
    }
    public function step3($id=null)
    {
        $user = Auth::user();
        
        if($user->role=='admin'){
            $company = Company::where('id', $id)->first();
            $user = $company->user;
            return view('admin.company.step3', [
                'company' => $company,
                'user' => $user,
                'currentStep' => 'step3',
            ]);
        }
        else{
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
            'holalpurja' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'hotiro'=> 'nullable|image|mimes:jpeg,png,jpg,gif',
            'lat'=> 'nullable|string|max:255',
            'lng'=> 'nullable|string|max:255',
            'copystep2data'=> 'nullable|boolean|max:255',
        ]);

        if ($request->hasFile('holalpurja')) {
            $holalpurja = $request->file('holalpurja');
            $holalpurjaName = time() . '.' . $holalpurja->getClientOriginalExtension(); 
            $holalpurja->move(public_path('document'), $holalpurjaName); 
            $validatedData['holalpurja'] =  $holalpurjaName; 
        }
       
        
        if ($request->hasFile('hotiro')) {
            $hotiro = $request->file('hotiro');
            $hotiroName = time() . '.' . $hotiro->getClientOriginalExtension(); 
            $hotiro->move(public_path('document'), $hotiroName); 
            $validatedData['hotiro'] =   $hotiroName; 
        }

        $company = Company::find($id);
        $company->update($validatedData);

          if(Auth::user()->role=='admin'){
            return redirect()->route('admin.company.step4',$company->id);
        }
        else{

        return redirect()->route('user.company.step4',$company->id);
        }
    }
    public function step4($id=null){
        $user = Auth::user();
        if($user->role=='admin'){
            $company = Company::where('id', $id)->first();
            $user = $company->user;
            return view('admin.company.step4', [
                'company' => $company,
                'user' => $user,
                'currentStep' => 'step4',
            ]);
        }
        else{
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
                         
        return view('user.company.step4', [
            'company' => $company,
            'user' => $user,
            'currentStep' => 'step4',
        ]);    }
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
          if(Auth::user()->role=='admin'){
            return redirect()->route('admin.company.step5',$company->id);
        }
        else{

        return redirect()->route('user.company.step5',$company->id);
        }
    }
    public function step5($id = null){
        $user = Auth::user();
         if($user->role=='admin'){
            $company = Company::where('id', $id)->first();
            $user = $company->user;
            return view('admin.company.step5', [
                'company' => $company,
                'user' => $user,
                'currentStep' => 'step5',
            ]);
        // If no ID is provided, fetch the first company of the user
        $company = Company::where('user_id', $user->id)
                          ->when($id, fn($query) => $query->where('id', $id))
                          ->first();
                        
 return view('user.company.step5', [
            'company' => $company,
            'user' => $user,
            'currentStep' => 'step5',
        ]);    }
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
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.company.step1',$company->id);
            }
            else{

        return redirect()->route('user.company.step1',$company->id)->with('success', 'Company details created successfully!');
    
            }
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
