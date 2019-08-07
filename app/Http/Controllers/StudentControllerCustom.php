<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentControllerCustom extends Controller
{
    public function studentview(){
    	return view('admin.pages.student_page.viewStudents');
    }

    public function stClassWiseView(Request $datas){
    	

    	if($datas->st_section != null){
    		$allStudents = Student::where('st_class', $datas->st_class)->where('st_section',$datas->st_section)->where('st_session', $datas->st_session)->get();
    	}
    	else{
    		$allStudents = Student::where('st_class', $datas->st_class)->where('st_session', $datas->st_session)->get();
    	}
    	return view('admin.pages.student_page.viewStudentsClassWise', compact('allStudents'));
    }
}
