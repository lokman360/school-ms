<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StudentClass;
use App\Section;
class Student extends Model
{
    protected $fillable = [
    	'st_name',
    	'st_f_name',
    	'st_m_name',
    	'st_phone',
    	'st_email',
    	'st_present_add',
    	'st_permanent_add',
    	'st_blood_group',
    	'st_religion',
    	'st_class',
        'st_section',
    	'st_session',
    	'st_roll_no',
    	'st_status',
    	'st_photo'

    ];

    public function stClass(){
        return $this->belongsTo(StudentClass::class,'st_class');
    }
    public function section(){
        return $this->belongsTo(Section::class,'st_section');
    }


}
