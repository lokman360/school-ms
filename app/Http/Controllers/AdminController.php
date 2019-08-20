<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentClass;
use App\Subject;
use App\Section;
use App\Exam;

class AdminController extends Controller
{
    public function index(){
    	$Student = Student::all();
    	$totalStudent = count($Student);

    	$StClass = StudentClass::all();
    	$totalClass = count($StClass);

    	$Subject = Subject::all();
    	$totalSubject = count($Subject);

        $Section = Section::all();
        $totalSection = count($Section);

        $Exam = Exam::all();
        $totalExam = count($Exam);
    	
    	return view('admin.pages.index', compact('totalStudent','totalClass','totalSection','totalSubject','totalExam'));
    }
}
