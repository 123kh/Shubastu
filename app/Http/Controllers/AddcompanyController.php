<?php

namespace App\Http\Controllers;

use App\Models\Addcompany;
use Illuminate\Http\Request;

class AddcompanyController extends Controller
{
 public function index(){
   
        $company = Addcompany::all();
        return view('addcompany',['company'=>$company]);
    
 }
 public function create(Request $request){


    $request->validate([
            
      
        'name' => 'required',
        'address' => 'required',
        'contact_person' => 'required',
        'mobile' => 'required',
        'username' => 'required',
        
        
    ]);
       $company=new Addcompany;
       $company->Name=$request->get('name');
       $company->Address=$request->get('address');
       $company->Contact_Person=$request->get('contact_person');
       $company->Mobile=$request->get('mobile');
       $company->save(); 
       return redirect(route('company'));
}
public function edit(Addcompany $company,$id)
   {
       $companyedit = Addcompany::find($id); 
       $company = Addcompany::all();
       return view('editcompany',['companys'=>$companyedit,'company'=>$company]);
      
       
   }
  
   public function update(Request $request)
   {
       Addcompany::where('id',$request->id)->update([ 
        'Name'=>$request->name,
        'Address'=>$request->address,
        'Contact_Person'=>$request->contact_person,
        'Mobile'=>$request->mobile
    ]);

     return redirect()->route('company')->with(['success'=>true,'message'=>'Successfully Updated !']);
   }


   public function destroy($id)
   {
       $company=Addcompany::where('id',$id)->delete();
       return redirect(route('company'));
   }



}
