<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Student;
use Validator;
use App\StudentClass;
use App\Section;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $section = Section::first();
        // dd($section->SectionClass->class_name);
         return view('admin.pages.student_page.student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classItems = StudentClass::pluck('class_name','id');
        $lastStudents = Student::orderBy('id','desc')->take(20)->get();
        return view('admin.pages.student_page.addStudentsList', compact('lastStudents','classItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('st_photo')){
            $file = $request->st_photo;
            $file->getClientOriginalName();
            $setNumber = rand(9999, 99999999).time();
            $ext = $file->getClientOriginalExtension();
            $setPhotoName = $setNumber.".".$ext;
            $file->move("upload/", $setPhotoName);
            $photo_array = [ 'st_photo'=>$setPhotoName]; 
            $has_photo = true;  
        }
        else{
            $has_photo = false;   
        }
        
        $request->validate([
                'st_name'=>'required',
                'st_class'=>'required',
                'st_session'=>'required',
                'st_roll_no'=>'required',            ],
            [
                'st_name.required'=>'The student name is required',
                'st_class.required'=>'The student class is required',
                'st_roll_no.required'=>'The student roll is required',
                'st_session.required'=>'The student session is required',
            ]
        );

        $formData = $request->all();

        if($has_photo == true){
            $formData = array_merge($formData,$photo_array);
        }

        $checkDouble = Student::where('st_class',$request->st_class)
                ->where('st_roll_no',$request->st_roll_no)
                ->where('st_section',$request->st_section)
                ->where('st_session',$request->st_session)
                ->get();

        if(count($checkDouble) < 1){
            $is_store = Student::create($formData);
            if($is_store){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Insert Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $classItems = StudentClass::pluck('class_name','id');
        $sectionItems = Section::pluck('section_name','id');
        return view('admin.pages.student_page.viewStudents', compact('classItems','sectionItems'));
    }

    public function classWiseView(Request $request){

        if($request->st_section != null){
            $classWiseSts = Student::where('st_class', $request->st_class)->where('st_section',$request->st_section)->where('st_session', $request->st_session)->get();
        }
        else{
            $classWiseSts = Student::where('st_class', $request->st_class)->where('st_session', $request->st_session)->get();
        }
        $classItems = StudentClass::pluck('class_name','id');
        return view('admin.pages.student_page.viewStudentsClassWise', compact('classWiseSts','classItems','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentById = Student::find($id);
        return view('admin.pages.student_page.studentEdit', compact('studentById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $request->validate([
                'st_name'=>'required',
                'st_class'=>'required',
                'st_session'=>'required',
                'st_roll_no'=>'required',
            ],
            [
                'st_name.required'=>'The student name is required',
                'st_class.required'=>'The student class is required',
                'st_roll_no.required'=>'The student roll is required',
                'st_session.required'=>'The student session is required',
            ]
        );

        $update_id = $request->update_id;

         if($request->file('st_photo')){
            $file = $request->st_photo;
            $file->getClientOriginalName();
            $setNumber = rand(9999, 99999999).time();
            $ext = $file->getClientOriginalExtension();
            $setPhotoName = $setNumber.".".$ext;
            $file->move("upload/", $setPhotoName);
            $photo_array = [ 'st_photo'=>$setPhotoName]; 
            $has_photo = true;  
        }
        else{
            $has_photo = false;   
        }

        $formData = $request->all();  
        if($has_photo == true){
            $formData = array_merge($formData,$photo_array);
        }




        $Student = Student::find($update_id);
        $is_update = $Student->update($formData);
        if($is_update){
            return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t insert']);
        }
   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != null){
            $is_delete = Student::where('id', $id)->delete();
            if($is_delete){
                return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
            }
            else{
                 return response()->json(['error'=>true,'errorMsg' => 'Data Can\'t Delete']);
            }
       
        }
    }



    public function quickViewFilter(Request $request){
        if($request->st_class != null){
            if($request->st_section == null){
                $class = $request->st_class;
                $student = Student::where('st_class', $class)->get();
                return response()->json(['errro'=>false, 'data'=>$student]);
            }
            else{
                $class = $request->st_class;
                $section = $request->st_section;
                $student = Student::where('st_class', $class)->where('st_section',$section)->get();
                return response()->json(['errro'=>false, 'data'=>$student]);
            }
        }
        if($request->st_session != null){
            $session = $request->st_session;
            $student = Student::where('st_session', $session)->get();
            return response()->json(['errro'=>false, 'data'=>$student]);
        }
    }



    
}