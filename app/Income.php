<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['income_cat','income_sub_cat','income_amount'];


    public function IncomeCat(){
    	return $this->belongsTo(IncomeCat::class,'income_cat');
    }
    public function IncomeSubCat(){
    	return $this->belongsTo(IncomeSubCat::class,'income_sub_cat');
    }
}
