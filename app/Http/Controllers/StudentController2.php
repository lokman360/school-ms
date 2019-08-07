<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.student_page.viewStudents');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->st_section != null){
            $allStudents = Student::where('st_class', $request->st_class)->where('st_section',$request->st_section)->where('st_session', $request->st_session)->get();
        }
        else{
            $allStudents = Student::where('st_class', $request->st_class)->where('st_session', $request->st_session)->get();
        }
        return view('admin.pages.student_page.viewStudentsClassWise', compact('allStudents'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       echo "result";
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
        return view('admin.pages.student_page.studentEdit2', compact('studentById'));
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
            return redirect('students/view')->with('successMsg','Student Update Successfully');
        }
        else{
            return redirect('students/view')->with('errorMsg','Student Can\'t Update');
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
        //
    }
}
