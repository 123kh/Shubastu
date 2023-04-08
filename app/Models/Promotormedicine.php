<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotormedicine extends Model
{
    use HasFactory;
    protected $table="promotorsalemedicine";
    protected $fillable=['promotor__sales_id','role','select_stokist_id','select_medical_id','select_medicine1','select_batchs','ptrs','mpss','qntys','
    qnty_mps_total','qnty_ptr_total'];

}
