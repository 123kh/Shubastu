<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(){
        $city=City::all();
        return view('city',['city'=>$city]);
    }
public function create(Request $request){

    $request->validate([
            
        'city' => 'required',
        
    ]);
    $city=new City;
    $city->city=$request->get('city');
    $city->save();
 
 return redirect(route('city'));
}
public function edit(city $city,$id)
    {
        $cityedit = City::find($id); 
        $city = City::all();
        return view('editcity',['citys'=>$cityedit,'city'=>$city]);
       
        
    }
   
    public function update(Request $request)
    {
        City::where('id',$request->id)->update([ 'city'=>$request->city]);

      return redirect()->route('city')->with(['success'=>true,'message'=>'Successfully Updated !']);
    }


    public function destroy(city $city,$id)
    {
        $city=city::where('id',$id)->delete();
        return redirect(route('city'));
    }
}

