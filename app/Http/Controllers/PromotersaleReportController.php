<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\Promotormedicine;
use App\Models\Promotor_Sale;
use App\Models\Year;
use App\Models\Addcompany;
use App\Models\Doctor;
use App\Models\Stockist;
use App\Models\Medical;
use Illuminate\Support\Facades\DB;

class PromotersaleReportController extends Controller
{
    public function index(Request $request){
    
        $stocmed=Promotor_Sale::
      
       leftjoin('promotorsalemedicine','promotorsalemedicine.promotor__sales_id','=','promotor__sales.id')
       ->leftjoin('stockists','stockists.id','=','promotorsalemedicine.select_stokist_id')
        ->leftjoin('medicals','medicals.id','=','promotorsalemedicine.select_medical_id')
        ->leftjoin('years','years.id','=','promotor__sales.year_id')
        ->leftjoin('addcompanies','addcompanies.id','=','promotor__sales.select_company_id')
        ->leftjoin('marketings','marketings.id','=','promotor__sales.select_marketing_id')
        ->leftjoin('doctors','doctors.id','=','promotor__sales.select_doctor_id')
        ->select('stockists.stockist','medicals.medical','promotor__sales.*','years.year','addcompanies.Name','marketings.name','doctors.allotted_dr_name','promotorsalemedicine.*','promotor__sales.id')
        ->groupby('promotorsalemedicine.promotor__sales_id');
        if(isset($request->year) && $request->year!=null){
            $stocmed=$stocmed->where('promotor__sales.year_id',$request->year);
        }
        if(isset($request->sale_of_month) && $request->sale_of_month!=null){
            $stocmed=$stocmed->where('promotor__sales.sale_of_month',$request->sale_of_month);
        }
        if(isset($request->company) && $request->company!=null){
            $stocmed=$stocmed->where('promotor__sales.select_company_id',$request->company);
        }
        if(isset($request->market) && $request->market!=null){
            $stocmed=$stocmed->where('promotor__sales.select_marketing_id',$request->market);
        }
        if(isset($request->doctor) && $request->doctor!=null){
            $stocmed=$stocmed->where('promotor__sales.select_doctor_id',$request->doctor);
        }
        if(isset($request->stockist) && $request->stockist!=null){
            $stocmed=$stocmed->where('promotor__sales.select_doctor_id',$request->stockist);
        }
        if(isset($request->medical) && $request->medical!=null){
            $stocmed=$stocmed->where('promotor__sales.select_doctor_id',$request->medical);
        }
        $stocmed=$stocmed->get();
        
    
        $year=Year::all();
        $company=Addcompany::all();
        $market=Marketing::all();
        $doctor=Doctor::all();
        $stockist=Stockist::all();
        $medical=Medical::all();
        $promotor=Promotormedicine::all();
        return view('Promotersalereport',['stocmed'=>$stocmed,'year'=>$year,'company'=>$company,'market'=>$market,'doctor'=>$doctor,'stockist'=>$stockist,'medical'=>$medical,'promotor'=>$promotor]);

    }


      public function promotersalereport(request $request){
        $proreport=DB::table('promotor__sales')
        ->leftjoin('promotorsalemedicine','promotorsalemedicine.promotor__sales_id','=','promotor__sales.id')
       ->leftjoin('stockists','stockists.id','=','promotorsalemedicine.select_stokist_id')
        ->leftjoin('medicals','medicals.id','=','promotorsalemedicine.select_medical_id')
        ->leftjoin('years','years.id','=','promotor__sales.year_id')
        ->leftjoin('addcompanies','addcompanies.id','=','promotor__sales.select_company_id')
        ->leftjoin('marketings','marketings.id','=','promotor__sales.select_marketing_id')
        ->leftjoin('doctors','doctors.id','=','promotor__sales.select_doctor_id')

        ->where([
        
            'promotorsalemedicine.promotor__sales_id'=>$request->entry_id 
        ])
        
        ->orderby('promotorsalemedicine.id','asc')
        ->select('stockists.stockist','medicals.medical','promotor__sales.*','years.year','addcompanies.Name','marketings.name','doctors.allotted_dr_name','promotorsalemedicine.*','promotor__sales.id')
        
        ->get();
        // echo json_encode($proreport);
        // exit();
        return response()->json(['proreport'=>$proreport]);
    }

    // public function promotersalereport(request $request){
    //     $proreport=DB::table('promotorsalemedicine')
    //     ->leftjoin('stockists','stockists.id','=','promotorsalemedicine.select_stokist_id')
    //     ->leftjoin('medicals','medicals.id','=','promotorsalemedicine.select_medical_id')
    //     ->leftjoin('promotor__sales','promotor__sales.id','=','promotorsalemedicine.promotor__sales_id')
    //     ->leftjoin('years','years.id','=','promotor__sales.year_id')
    //     ->leftjoin('addcompanies','addcompanies.id','=','promotor__sales.select_company_id')
    //     ->leftjoin('marketings','marketings.id','=','promotor__sales.select_marketing_id')
    //     ->leftjoin('doctors','doctors.id','=','promotor__sales.select_doctor_id')
       
        
    //     ->where([
        
    //         'promotorsalemedicine.id'=>$request->entry_id 
    //     ])
        
    //     ->orderby('promotorsalemedicine.id','asc')
    //     ->select('stockists.stockist','medicals.medical','promotor__sales.*','years.year','addcompanies.Name','marketings.name','doctors.allotted_dr_name','promotorsalemedicine.*')
        
    //     ->first();
    //     // echo json_encode($proreport);
    //     // exit();
    //     return response()->json(['proreport'=>$proreport]);
    // }

    public function marketing(Request $request)
  
    {
        $data = Marketing::where('select_company_id', $request->id)->orderby('name', 'asc')->get();
        return response()->json($data);
    }

    // public function destroy($id)
    // {
    //     $delete=Promotormedicine::where('promotor__sales_id',$id)->delete();
        
    //     $city=Promotor_Sale::where('id',$id)->delete();
    //     return redirect()->back();
    // }
}
