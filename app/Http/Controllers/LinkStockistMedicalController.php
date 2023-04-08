<?php

namespace App\Http\Controllers;
use App\Models\Link_Stockist_Medical;
use App\Models\Addcompany;
use App\Models\City;
use App\Models\Medical;
use App\Models\Stockist;
use Illuminate\Http\Request;

class LinkStockistMedicalController extends Controller
{
    public function index(){
        $mark=Link_Stockist_Medical::
        join ('cities','cities.id','=','link__stockist__medicals.select_city_id')
        ->join ('stockists','stockists.id','=','link__stockist__medicals.select_stockist_id')
        ->orderby('link__stockist__medicals.id','desc')
        ->select('link__stockist__medicals.*','cities.city','stockists.stockist')
        ->get();
        $city=City::all();
        $addcompanies=Addcompany::all();
        $stock=Stockist::all();
        $medica=Medical::all();
        
         return view('link_stockist_medical',['mark'=>$mark,'city'=>$city,'addcompanies'=>$addcompanies,'stock'=>$stock,'medica'=>$medica]);

    }
    public function create(Request $request){

        
      
      $request->validate([
            
                
        'select_city_id' => 'required',
        'select_company_id' => 'required',
        'select_stockist_id' => 'required',
        'select_medical_id' => 'required',
        
       
        
    ]);
        $mark=new Link_Stockist_Medical;
        $mark->select_city_id=$request->get('select_city_id');
        //$mark->select_company_id=implode(',',$request->get('select_company_id'));
        $mark->select_company_id=$request->get('select_company_id');
        $mark->select_stockist_id=$request->get('select_stockist_id');
       //$mark->select_medical_id=implode(',',$request->get('select_medical_id'));
        $mark->select_medical_id=$request->get('select_medical_id');
       
        $mark->save(); 
        return redirect(route('linkstockist'));
        }
       
        public function edit($id)
          {
       $mededit = Link_Stockist_Medical::find($id); 
      
       $mark=Link_Stockist_Medical::
       join ('cities','cities.id','=','link__stockist__medicals.select_city_id')
   
       ->join ('stockists','stockists.id','=','link__stockist__medicals.select_stockist_id')
       
       ->orderby('link__stockist__medicals.id','desc')
       ->select('link__stockist__medicals.*','cities.city','stockists.stockist')
       ->get();
       $city=City::all();
       $addcompanies=Addcompany::all();
       $stock=Stockist::all();
       $medica=Medical::all();
         return view('editlinkstockistmedical',['mededit'=>$mededit,'mark'=>$mark,'city'=>$city,'mark'=>$mark,'addcompanies'=>$addcompanies,'stock'=>$stock,'medica'=>$medica]);
             
              
          }
         
          public function update(Request $request)
          {
            $mark=Link_Stockist_Medical::find($request->id);
            $mark->select_city_id=$request->get('select_city_id');
        $mark->select_company_id=$request->get('select_company_id');

            $mark->select_stockist_id=$request->get('select_stockist_id');
            $mark->select_medical_id=$request->get('select_medical_id');
                $mark->save(); 
               
           
       
            return redirect()->route('linkstockist')->with(['success'=>true,'message'=>'Successfully Updated !']);
          }
       
       
          public function destroy($id)
          {
              $med=Link_Stockist_Medical::where('id',$id)->delete();
              return redirect(route('linkstockist'));
          }
       
       
       
}



