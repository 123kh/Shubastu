<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table="doctors";
    protected $fillable=['allotted_dr_name','hospital_address','mobile','email','promoter_name','account_number','ifsc','pan_no','username','password','city_id','medical_id','Scheme'];


    protected $casts = [
        'medical_id' => 'array',
        
    ];
    public function getdoctAttribute()
    {
       
        $link=Medical::whereIn('id',$this->medical_id)->pluck('medical')->toArray(); 
        return implode(', ',$link);
    }


}
