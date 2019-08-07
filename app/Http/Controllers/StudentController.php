<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.student_page.student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastStudents = Student::orderBy('id','desc')->take(20)->get();
        return view('admin.pages.student_page.addStudentsList', compact('lastStudents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('st_photo')){
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
                'st_f_name'=>'required',
                'st_phone'=>'required|max:11',
                'st_present_add'=>'required',
                'st_religion'=>'required',
                'st_class'=>'required',
                'st_session'=>'required',
                'st_roll_no'=>'required',
            ],
            [
                'st_name.required'=>'The Name filed is required',
                'st_f_name.required'=>'The Father Name filed is required',
                'st_phone.required'=>'The Phone filed is required',
                'st_phone.max'=>'The Phone must be 11 digit',
                'st_present_add.required'=>'The Pressent Address filed is required',
                'st_religion.required'=>'The Religion filed is required',
                'st_class.required'=>'The Class filed is required',
                'st_roll_no.required'=>'The Roll filed is required',
                'st_session.required'=>'The Session filed is required',
            ]
        );

        $formData = $request->all();

        if($has_photo == true){
            $formData = array_merge($formData,$photo_array);
        }

        // Start Check Double Entry ///
        $st_class = $request->st_class;
        $st_roll_no = $request->st_roll_no;
        $st_session = $request->st_session;
        $st_section = $request->st_section;
        $checkDouble = Student::all()->where('st_class',$st_class)->where('st_roll_no',$st_roll_no)->where('st_session',$st_session)->where('st_section',$st_section);
        // End Check Double Entry ///

        if(count($checkDouble) < 1){
            $is_store = Student::create($formData);
            if($is_store){
                session()->flash('successMsg','Student Insert Successfully');
                return redirect('student/create');
            }
        }
        else{
            session()->flash('errorMsg','Student already Stored');
            return redirect('student/create');
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
    public function update(Request $request, $id)
    {
        
        if($request->hasFile('st_photo')){
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
                'st_f_name'=>'required',
                'st_phone'=>'required|max:11',
                'st_present_add'=>'required',
                'st_religion'=>'required',
                'st_class'=>'required',
                'st_session'=>'required',
                'st_roll_no'=>'required',
            ],
            [
                'st_name.required'=>'The Name filed is required',
                'st_f_name.required'=>'The Father Name filed is required',
                'st_phone.required'=>'The Phone filed is required',
                'st_phone.max'=>'The Phone must be 11 digit',
                'st_present_add.required'=>'The Pressent Address filed is required',
                'st_religion.required'=>'The Religion filed is required',
                'st_class.required'=>'The Class filed is required',
                'st_roll_no.required'=>'The Roll filed is required',
                'st_session.required'=>'The Session filed is required',
            ]
        );

        $formData = $request->all();  
        if($has_photo == true){
            $formData = array_merge($formData,$photo_array);
        }

        $Student = Student::find($id);
        $is_update = $Student->update($formData);
        if($is_update){
            return redirect('student/create')->with('successMsg','Student Update Successfully');
        }
        else{
            return redirect('student/create')->with('errorMsg','Student Can\'t Update');
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
        $student = Student::find($id);
        if($student){
            $is_delete = $student->delete();
            if($is_delete){
                session()->flash('successMsg','Student Delete Successfully');
                return redirect()->back();
                die;
            }
            else{
                session()->flash('errorMsg','Student Can\'t Delete');
                return redirect()->back();
            }
        }
        else{
            session()->flash('errorMsg','Invalid Student ID');
            return redirect()->back();
        }
    }
}
