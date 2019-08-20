<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\StudentClass;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.exam_page.exam');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classItems = StudentClass::pluck('class_name','id');
        $lastExams = Exam::orderby('id','desc')->take(10)->get();
        return view('admin.pages.exam_page.addExamList',compact('lastExams','classItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_class'=>'required',
            'exam_type'=>'required',
            'exam_session'=>'required',
            'exam_name'=>'required'
        ]);
        $checkDouble = Exam::where('exam_class',$request->exam_class)
                        ->where('exam_type',$request->exam_type)
                        ->where('exam_session',$request->exam_session)
                        ->where('exam_name',$request->exam_name)
                        ->get();
        if(count($checkDouble) < 1){
            $is_save = Exam::create($request->all());
            if($is_save){
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id = $request->exam_id;
        $request->validate([
            'exam_class'=>'required',
            'exam_type'=>'required',
            'exam_session'=>'required',
            'exam_name'=>'required'
        ]);
        $checkDouble = Exam::where('exam_class',$request->exam_class)
                        ->where('exam_type',$request->exam_type)
                        ->where('exam_session',$request->exam_session)
                        ->where('exam_name',$request->exam_name)
                        ->get();
        if(count($checkDouble) < 1){
            $exam = Exam::find($id);
            $is_update = $exam->update($request->all());
            if($is_update){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
            }
            else{
                return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data Can\'t Update']);
            }
        }
        else{
            return response()->json(['error'=>true,'iconMsg'=>'error','headingMsg'=>'Opps!','errorMsg'=>'Data is already exist']);
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

            $is_delete = Exam::where('id',$id)->delete();
            if($is_delete){
                return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
            }
            else{
                 return response()->json(['error'=>true,'errorMsg' => 'Data Can\'t Delete']);
            }
        }


    }







    public function checkExam(Request $request){
       if($request->stclass != null){
            $checkExams = Exam::where('exam_session',$request->value)->where('exam_class',$request->stclass)->get();
            $data = '<option value="">Select Exam</option>';
            foreach ($checkExams as $row) {
                $data .= '<option value="'.$row->id.'">'.$row->exam_name.'</option>';
            }
            return response()->json(['data'=>$data]);
        }
        else{
            $checkExams = Exam::where('exam_session',$request->value)->get();
            $data = '<option value="">Select Exam</option>';
            foreach ($checkExams as $row) {
                $data .= '<option value="'.$row->id.'">'.$row->exam_name.'</option>';
            }
            return response()->json(['data'=>$data]);
        }
    }



    // public function checkSession(Request $request){
       
    //     $examClasses = Exam::where('exam_class',$request->value)->get();
    //     $examClasses = $examClasses->distinct('exam_session')
    //     $data = '<option value="">Select Session</option>';
    //     foreach ($examClasses as $row) {
    //         $data .= '<option value="'.$row->exam_session.'">'.$row->exam_session.'</option>';
    //     }
    //     return response()->json(['data'=>$data]);
    // }















}
