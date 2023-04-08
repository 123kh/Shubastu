<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    protected $table="marketings";
    protected $fillable=['city_id','select_company_id','name','mobile','email','address','username','
    password','pan','aadhar_card'];


    public function getmarketingAttribute()
    {
        $link=explode(',',$this->city_id);
        $link=City::whereIn('id',$link)->pluck('city')->toArray(); 
        return implode(', ',$link);
    }

    public function getmarketingrAttribute()
    {
        $link=explode(',',$this->select_company_id);
        $link=Addcompany::whereIn('id',$link)->pluck('Name')->toArray(); 
        return implode(', ',$link);
    }
}
