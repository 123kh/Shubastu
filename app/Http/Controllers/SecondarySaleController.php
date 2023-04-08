<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Addcompany;
use App\Models\Secondary_Sale;
use App\Models\Stockist;
use App\Models\SecondaryMedicine;
use Illuminate\Support\Facades\DB;

class SecondarySaleController extends Controller
{
    public function index(){
        $secondary=Secondary_Sale::
        join('years','years.id','=','secondary__sales.year_id')
        ->join('addcompanies','addcompanies.id','=','secondary__sales.select_company_id')
        ->join('stockists','stockists.id','=','secondary__sales.select_stokist_id')
        ->select('secondary__sales.*','years.year','addcompanies.Name','stockists.stockist')
        ->get();
        $year=Year::all();
        $company=Addcompany::all();
        $stockist=Stockist::all();
        return view('secondary_sale',['secondary'=>$secondary,'year'=>$year,'company'=>$company,'stockist'=>$stockist]);
    }

    public function medicine(Request $request)
  
        {
            $data = DB::table('medicinesecond')
            ->select('medicines.medicine','medicines.id')
            ->where('medicinesecond.select_company_id', $request->company_id)
            ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
            
            ->join('medicines','medicines.id','=','medicinesecond.medicine_id')
         ->get();
            return response()->json($data);
        }

        // public function batchnocompany(Request $request)
  
        // {
        //   //dd($request->all());
        //   $medicinesecond=DB::table('medicinesecond')
        //   ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
        //   ->join('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
        //   ->where([
        //       'medicinesecond.select_company_id'=>$request->company_id,
        //       'medicinesecond.medicine_id'=>$request->medicine,  
        //   ])
        //   ->select('primary__sales.batch_no')->first();
        //       return response()->json($medicinesecond);
            
        //   }
          public function batchnocompany(Request $request)
  
          {
            //dd($request->all());
            $medicinesecond=DB::table('medicinesecond')
            ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
            ->join('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
            ->where([
                'medicinesecond.select_company_id'=>$request->company_id,
                'medicinesecond.medicine_id'=>$request->medicine,
           
    
    
            ])
            ->select('primary__sales.batch_no','primary__sales.id')->get();
            
            return response()->json($medicinesecond);
            
          }
  
          public function create(Request $request){
            //    echo json_encode($request->all());
            //    exit();
            $request->validate([
            
                
                'year_id' => 'required',
                'sale_of_month' => 'required',
                'company' => 'required',
                'stockist' => 'required',
                  'medical' => 'required',
              
                  'medicine' => 'required',
                  'batch' => 'required',
                  'qnty' => 'required',
                  'purchase' => 'required',
                    'mpsqnty' => 'required',
                
               
                
            ]);
                $promotor=new Secondary_Sale;
                $promotor->year_id=$request->get('year_id');
                $promotor->sale_of_month=$request->get('sale_of_month');
                $promotor->select_company_id=$request->get('company');
                $promotor->select_stokist_id=$request->get('stockist');
                $promotor->sale_value=$request->get('medical');//sale value
               
                 
                $promotor->grand_total1=$request->get('grand_total1');
                
               $promotor->save(); 
            
                $insert_id=$promotor->id;
            
                for($i=0;$i<count($request->medicine); $i++){
                $promotormedicine=new SecondaryMedicine;
                $promotormedicine->secondary__sales_id=$insert_id;
              
            
                $promotormedicine->select_medicine=$request->medicine[$i];
                $promotormedicine->select_batch=$request->batch[$i];
                $promotormedicine->qnty=$request->qnty[$i];
            
         
                $promotormedicine->purchase_rate=$request->purchase[$i];
                $promotormedicine->qntypurchase=$request->mpsqnty[$i];
               
                $promotormedicine->save();
            }
            
            
               
               // return redirect(route('promotor'));
               return redirect()->back();
            }


            public function purchase(Request $request)
  
            {
              // dd($request->all());
              $medicinesecond=DB::table('medicinesecond')
              ->join('add_medicines','add_medicines.medicinesecond_id','=','medicinesecond.id')
              ->join('primary__sales','primary__sales.id','=','medicinesecond.batch_no_id')
              ->where([
                  'medicinesecond.batch_no_id'=>$request->batch,
                  'medicinesecond.medicine_id'=>$request->medicine,
            
      
      
              ])
              ->select('medicinesecond.purchase')->first();
            
              return response()->json($medicinesecond);
            
            }
    }
