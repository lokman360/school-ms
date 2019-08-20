<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['exam_name','exam_class','exam_session','exam_type'];

    public function stClass(){
    	return $this->belongsto(StudentClass::class,'exam_class');
    }

}
