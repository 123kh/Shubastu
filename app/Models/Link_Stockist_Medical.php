<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link_Stockist_Medical extends Model
{
    use HasFactory;
    protected $table="link__stockist__medicals";
    protected $fillable=['select_city_id','select_company_id','select_stockist_id','select_medical_id'];

    protected $casts = [
        'select_company_id' => 'array',
        'select_medical_id' => 'array',
    ];
    //table me ek se zada value show krne ke liye
    public function getLinkmedicalAttribute()
    {
        //$link=explode(',',$this->select_company_id);
        $link=Addcompany::whereIn('id',$this->select_company_id)->pluck('Name')->toArray(); 
        return implode(', ',$link);
    }

    public function getLinkmAttribute()
    {
        $link=Medical::whereIn('id',$this->select_medical_id)->pluck('medical')->toArray(); 
        return implode(', ',$link);
    }
}
