<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class StudentClass extends Model
{
    protected $fillable = ['class_name'];

    public function student(){
        return $this->hasOne(Student::class,'st_class');
    }

}
