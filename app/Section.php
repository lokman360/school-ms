<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StudentClass;

class Section extends Model
{
    protected $fillable =['section_name','section_class'];

    public function stClass(){
        return $this->belongsTo(StudentClass::class,'section_class');
    }
}
