<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Addcompany;
use App\Models\Doctor;
use App\Models\Marketing;
use App\Models\Medical;
use App\Models\Promotor_Sale;
use App\Models\Promotormedicine;
use App\Models\Stockist;
use App\Models\Link_Stockist_Medical;
use App\Models\Medicine;
use App\Models\Add_medicine;
use App\Models\Medicine_List;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class PromotorSaleController extends Controller
{
    public function index()
    {
        $promotor=Promotor_Sale::
        join('years','years.id','=','promotor__sales.year_id')
        ->join('addcompanies','addcompanies.id','=','promotor__sales.select_company_id')
        ->join('marketings','marketings.id','=','promotor__sales.select_marketing_id')
        ->join('doctors','doctors.id','=','promotor__sales.select_doctor_id')
       
        // ->orderby('promotor__sales.id','desc')
        ->select('promotor__sales.*','years.year','addcompanies.Name','marketings.name','doctors.allotted_dr_name')
        // ->where('promotor__sales.select_company_id','promotor__sales.')       
        ->get();

        $stocmed=Promotormedicine::
        join('stockists','stockists.id','=','promotorsalemedicine.select_stokist_id')
        ->join('medicals','medicals.id','=','promotorsalemedicine.select_medical_id')
        ->select('stockists.stockist','medicals.medical')
        ->get();
        $year=Year::all();
        $company=Addcompany::all();
        $market=Marketing::all();
        $doctor=Doctor::all();
        $stockist=Stockist::all();
        $medical=Medical::all();
      
        return view('promotor_sales',['promotor'=>$promotor,'stocmed'=>$stocmed,'year'=>$year,'company'=>$company,'market'=>$market,'doctor'=>$doctor,'stockist'=>$stockist,'medical'=>$medical]);
    }

   public function market(Request $request)
  
    {
        $data = Marketing::where('select_company_id', $request->id)->orderby('name', 'asc')->get();
        return response()->json($data);
    }

    public function medical(Request $request)
  
    {   //do column pe on change krrne ke liye
        
        $doctor = Doctor::where('id', $request->doctor_id)
        ->value('medical_id');
      
        $stockist=Link_Stockist_Medical::select('select_medical_id')->where('select_stockist_id',$request->stockist_id)
        ->select('select_medical_id')->get();
       
        $stockist=Arr::pluck($stockist, 'select_medical_id');//here we pluck the value without column name

        $stockist=Arr::flatten($stockist); //here we merge the value in single array
       
        if(count($doctor)>0 && count($stockist)>0) { //here we check both the varaible not empty
            $common_id=array_intersect($doctor,$stockist); //here we find common value from both array
            //common value find karne ke liye intersect 
         
            $medical=Medical::whereIn('id',$common_id)
            ->get(); //we have array of id. using id's we are fetching the multiple medicals
           
            return response()->json($medical);
        }else{
            return response()->json(null);

        }
        
       
    }


    // public function medicine(Request $request)
  
    // {   //do column pe on change krrne ke liye
        
    //     $doctor = Doctor::where('id', $request->doctor_id)
    //     ->value('medical_id');
      
    //     $stockist=Link_Stockist_Medical::select('select_medical_id')->where('select_stockist_id',$request->stockist_id)
    //     ->select('select_medical_id')->get();
       
    //     $stockist=Arr::pluck($stockist, 'select_medical_id');//here we pluck the value without column name

    //     $stockist=Arr::flatten($stockist); //here we merge the value in single array
       
    //     if(count($doctor)>0 && count($stockist)>0) { //here we check both the varaible not empty
    //         $common_id=array_intersect($doctor,$stockist); //here we find common value from both array
    //         //common value find karne ke liye intersect 
         
    //         $medical=Medical::whereIn('id',$common_id)
    //         ->get(); //we have array of id. using id's we are fetching the multiple medicals
           
    //         return response()->json($medical);
    //     }else{
    //         return response()->json(null);

    //     }
        
        public function medicine(Request $request)
  
        {
            $data = DB::table('medicinesecond')
            ->select('medicines.medicine','medicines.id')
            ->where('medicinesecond.select_company_id', $request->company_id)
            ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
            ->where('add_medicines.default_scheme',$request->scheme)
            ->join('medicines','medicines.id','=','medicinesecond.medicine_id')
         ->get();
            return response()->json($data);
        }
    

         public function ptrmarket(Request $request)
  
      {
      
        $medicinesecond=DB::table('medicinesecond')
        ->leftjoin('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
        ->leftjoin('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
        ->where([
            'medicinesecond.select_company_id'=>$request->company_id,
            'medicinesecond.medicine_id'=>$request->medicine,
            'add_medicines.default_scheme'=>$request->scheme,

            //substr($request->scheme, 0, -1),
        ])
        ->select('add_medicines.ptr','add_medicines.marketing_promotion_scheme','primary__sales.batch_no')->first();
    //   echo json_encode($medicinesecond);
    //   exit();


        
            // $data = DB::table('medicinesecond')
          
            // ->select('add_medicines.ptr','add_medicines.marketing_promotion_scheme')
            // ->where('medicinesecond.select_company_id', $request->company_id)
            // ->leftjoin('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
            // ->where('add_medicines.default_scheme',$request->scheme)
            // ->leftjoin('medicines','medicines.id','=','medicinesecond.medicine_id')
            // ->where('medicinesecond.medicine_id',$request->medicine)
            // ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
      
            // ->get();
            return response()->json($medicinesecond);
          
        }


        // public function batch(Request $request)
  
        // {
        //   //dd($request->all());
        //   $medicinesecond=DB::table('medicinesecond')
        //   ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
        //   ->join('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
        //   ->where([
        //       'medicinesecond.select_company_id'=>$request->company_id,
        //       'medicinesecond.medicine_id'=>$request->medicine,
        //       'add_medicines.default_scheme'=>$request->scheme,
  
  
        //   ])
        //   ->select('primary__sales.batch_no')->first();
          
        //   return response()->json($medicinesecond);
          
        // }

        public function get_scheme(Request $request)
        {
            $drschem=DB::table('doctors')
            ->where([

                'doctors.id'=>$request->doctor_id //doctor_id=script me jo data me hai wo id
            ])
            ->select('doctors.Scheme')
            ->first();//agar hume sirf ek hi value dikhani hai to first

            return response()->json($drschem);
        }

    //     public function ptrmarket(Request $request)
  
    //     {

    //     $data=Add_medicine::
    //     where('medicinesecond.select_company_id', $request->company_id)
    //     ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
    //     ->where('add_medicines.default_scheme',$request->scheme)
    //     ->join('medicines','medicines.id','=','medicinesecond.medicine_id')
    //     ->where('add_medicines.medicine_id',$request->medicine)
    //     ->select('add_medicines.ptr','add_medicines.marketing_promotion_scheme')
    //     ->get();
    //     return response()->json($data);
    // }


        public function scheme_medicine(Request $request){
            $show = Add_medicine::where('default_scheme',$request['scheme_select'])
            ->where('company',$request['company'])->get();
            echo json_encode($show);
        }


// public function qntymps(Request $request){
//     //dd($request->all());
//     $data=DB::table('medicinesecond')
//     ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
//     ->join('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
 
//     ->where([
//         'medicinesecond.batch_no_id'=>$request->id,

//     ])
//     ->select('promotorsalemedicine.qnty_mps_total')->get();
    
//     return response()->json($data);
    
// }

public function create(Request $request){
//    echo json_encode($request->all());
//    exit();


$request->validate([
            
                
    // 'year_id' => 'required',
    // 'sale_of_month' => 'required',
    'company' => 'required',
    'market' => 'required',
    'doctor' => 'required',
    'stockist' => 'required',
    'medical' => 'required',
    // 'sheme' => 'required',

    'medicine' => 'required',
    'ptr1' => 'required',
    'mps1' => 'required',
    'qnty' => 'required',
    'batch' => 'required',
     'mpsqnty'=>'required',
     'ptrqnty'=>'required',
   
    
]);
    $promotor=new Promotor_Sale;
    $promotor->year_id=$request->get('year_id');
    $promotor->sale_of_month=$request->get('sale_of_month');
    $promotor->select_company_id=$request->get('company');
    $promotor->select_marketing_id=$request->get('market');
    $promotor->select_doctor_id=$request->get('doctor');
    // $promotor->select_stokist_id=$request->get('stockist');
    // $promotor->select_medical_id=$request->get('medical');
    $promotor->select_scheme=$request->get('sheme');
     
    $promotor->grand_total1=$request->get('grand_total1');
    $promotor->grand_total2=$request->get('grand_total2');
   $promotor->save(); 

    $insert_id=$promotor->id;

    for($i=0;$i<count($request->medicine); $i++){
    $promotormedicine=new Promotormedicine;
    $promotormedicine->promotor__sales_id=$insert_id;
  
    $promotormedicine->select_stokist_id=$request->stockist[$i];
    $promotormedicine->select_medical_id=$request->medical[$i];
    $promotormedicine->select_medicine1=$request->medicine[$i];
    $promotormedicine->select_batchs=$request->batch[$i];
    $promotormedicine->ptrs=$request->ptr1[$i];
    $promotormedicine->mpss=$request->mps1[$i];
    $promotormedicine->qntys=$request->qnty[$i];

    
    $promotormedicine->qnty_mps_total=$request->mpsqnty[$i];
    $promotormedicine->qnty_ptr_total=$request->ptrqnty[$i];
   
    $promotormedicine->save();
}


   
   // return redirect(route('promotor'));
   return redirect()->back();
}
}

    








