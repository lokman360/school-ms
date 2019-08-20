<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name','subject_class','subject_section'];


    public function stClass(){
        return $this->belongsTo(StudentClass::class,'subject_class');
    }
    public function section(){
        return $this->belongsTo(Section::class,'subject_section');
    }
    
}
