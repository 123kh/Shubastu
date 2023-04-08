<?php

namespace App\Http\Controllers;

use  App\Models\Tds;
use Illuminate\Http\Request;


class TdsController extends Controller
{
    public function index(){

       $td=Tds::all();
        return view('tds',['tds'=>$td]);
    }

    public function create(Request $request){
        $request->validate([
            
                
            'td' => 'required',
            
           
            
        ]);
        $t=new Tds;
        $t->tds=$request->get('td');
        $t->save(); 
        return redirect(route('tds'));

    }
}
