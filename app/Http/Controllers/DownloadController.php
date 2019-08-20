<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentClass;
use App\Section;
use App\Student;
use App\Exam;
use App\Subject;

class DownloadController extends Controller
{
    public function index()
    {
    	return view('admin.pages.download_page.download');
    }
    public function seatplan()
    {
    	$classItems = StudentClass::pluck('class_name','id');
    	$examItems =  Exam::pluck('exam_name','id');
    	return view('admin.pages.download_page.seatplan.seatPlan',compact('classItems','examItems'));
    }



    public function seatplanView(Request $request)
    {
    	if($request->st_section == null){
    		$students = Student::where('st_class',$request->st_class)
    							->where('st_session', $request->st_session)
    							->get();
    	}
    	else{
    		$students = Student::where('st_class',$request->st_class)
					->where('st_section', $request->st_section)
					->where('st_session', $request->st_session)
					->get();
    	}
    	$exam = Exam::where('id', $request->st_exam)->first();
    	$classItems = StudentClass::pluck('class_name','id');
    	if($exam->exam_session == $request->st_session){
    		return view('admin.pages.download_page.seatplan.seatPlanView', compact('students','request','exam'));	
    	}
    	else{
    		return view('admin.pages.download_page.seatplan.seatPlanView', compact('request','exam'));	
    	}	
    }



    public function admitCard()
    {
        $classItems = StudentClass::pluck('class_name','id');
        $examItems =  Exam::pluck('exam_name','id');
        return view('admin.pages.download_page.admitcard.admitCard',compact('classItems','examItems'));
    }



    public function admitCardView(Request $request)
    {

        if($request->st_section == null){
            $students = Student::where('st_class',$request->st_class)
                                ->where('st_session', $request->st_session)
                                ->get();
        }
        else{
            $students = Student::where('st_class',$request->st_class)
                    ->where('st_section', $request->st_section)
                    ->where('st_session', $request->st_session)
                    ->get();
        }
        $exam = Exam::where('id', $request->st_exam)->first();
        $classItems = StudentClass::pluck('class_name','id');
        $subjects = Subject::where('subject_class',$request->st_class)->get();

        if($exam->exam_session == $request->st_session){
            return view('admin.pages.download_page.admitcard.admitCardView', compact('students','request','exam','subjects'));   
        }
        else{
            return view('admin.pages.download_page.admitcard.admitCardView', compact('request','exam'));  
        }   
    }








}
