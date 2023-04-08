<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;
use App\Models\Medical;
use App\Models\City;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $doc=Doctor::
        join ('cities','cities.id','=','doctors.city_id')
        // ->join('medicals','medicals.id','=','doctors.medical_id')
        ->orderby('doctors.id','desc')
        ->select('doctors.*','cities.city')
        ->get();
        $city=City::all();
        $medical=Medical::all();
        
     
         return view('add_doctor',['doc'=>$doc,'city'=>$city,'medical'=>$medical]);
      
    }
    public function create(Request $request){

      // dd($request->all());
      $request->validate([
            
                
        'allotted_dr_name' => 'required',
        'hospital_address' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'promoter_name' => 'required',
        'account_number' => 'required',
            
        'ifsc' => 'required',
        'pan_no' => 'required',
        'username' => 'required',
        'password' => 'required',
        'city_id' => 'required',
        'medical_id' => 'required',
        'Scheme' => 'required',
       
        
    ]);
   
        $doc=new Doctor;
        $doc->allotted_dr_name=$request->get('allotted_dr_name');
        $doc->hospital_address=$request->get('hospital_address');
        $doc->mobile=$request->get('mobile');
        $doc->email=$request->get('email');
        $doc->promoter_name=$request->get('promoter_name');
        $doc->account_number=$request->get('account_number');
        $doc->ifsc=$request->get('ifsc');
        $doc->pan_no=$request->get('pan_no');
        $doc->username=$request->get('username');
        $doc->password=Hash::make($request->get('password'));
        $doc->city_id=$request->get('city_id');
        $doc->medical_id=$request->get('medical_id');
        $doc->Scheme=implode(',',$request->get('Scheme'));//for checkbox
        $doc->save(); 
      
        return redirect(route('doctor'));
        }
       
        public function edit($id)
          {
       $mededit = Doctor::find($id); 
       $doc=Doctor::
        join ('cities','cities.id','=','doctors.city_id')
       
        ->orderby('doctors.id','desc')
        ->select('doctors.*','cities.city')
        ->get();
        $city=City::all();
        $medic=Medical::all();
         return view('editdoctor',['mededit'=>$mededit,'doc'=>$doc,'city'=>$city,'doc'=>$doc,'medic'=>$medic]);
             
              
          }
         
          public function update(Request $request)
          {
            $doc=Doctor::find($request->id);
                
            // $doc=new Doctor;
            $doc->allotted_dr_name=$request->get('allotted_dr_name');
            $doc->hospital_address=$request->get('hospital_address');
            $doc->mobile=$request->get('mobile');
            $doc->email=$request->get('email');
            $doc->promoter_name=$request->get('promoter_name');
            $doc->account_number=$request->get('account_number');
            $doc->ifsc=$request->get('ifsc');
            $doc->pan_no=$request->get('pan_no');
            $doc->username=$request->get('username');
            $doc->password=Hash::make($request->get('password'));
            $doc->city_id=$request->get('city_id');
            $doc->medical_id=$request->get('medical_id');
            $doc->Scheme=implode(',',$request->get('Scheme'));//for checkbox
            $doc->save(); 
            return redirect(route('doctor'));
            }
       
       
          public function destroy($id)
          {
              $med=Doctor::where('id',$id)->delete();
              return redirect(route('doctor'));
          }
       
       
       
}


