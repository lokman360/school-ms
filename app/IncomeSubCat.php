<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IncomeCat;

class IncomeSubCat extends Model
{
    protected $fillable = ['income_sub_cat','income_cat'];

    public function IncomeCatName(){
    	return $this->belongsTo(IncomeCat::class,'income_cat');
    }
}

