<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\StudentClass;
use App\Section;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.subject_page.Subject');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $classItems = StudentClass::pluck('class_name', 'id');
        $sectionItems = Section::pluck('section_name', 'id');
        $lastSubjects = Subject::orderby('id','desc')->take(10)->get();
        return view('admin.pages.subject_page.addSubjectList', compact('lastSubjects','classItems','sectionItems'));
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
            'subject_name'=>'required',
            'subject_class'=>'required'
        ]);
        $checkDouble = Subject::where('subject_name',$request->subject_name)
            ->where('subject_section',$request->subject_section)
            ->where('subject_class',$request->subject_class)
            ->get();
        if(count($checkDouble) < 1){
            $is_save = Subject::create($request->all());
            if($is_save){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Insert Successfully']);
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
    {   $classItems = StudentClass::pluck('class_name', 'id');
        $allSubjects = Subject::orderby('id','desc')->get();
        return view('admin.pages.subject_page.viewSubjectList', compact('allSubjects','classItems'));
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
         $request->validate([
            'subject_class'=>'required',
            'subject_name'=>'required'
        ]);
        $id = $request->subject_id;

        $checkDouble = Subject::where('subject_name',$request->subject_name)
                ->where('subject_section',$request->subject_section)
                ->where('subject_class',$request->subject_class)
                ->get();
        if(count($checkDouble) < 1){
            $updateData = Subject::find($id);
            $is_update = $updateData->update($request->all());
            if($is_update){
                return response()->json(['error'=>false,'iconMsg'=>'success','headingMsg'=>'Thank You!','successMsg'=>'Data Update Successfully']);
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
            $is_delete = Subject::where('id',$id)->delete();
            if($is_delete){
                return response()->json(['error'=>false,'iconMsg'=>'success','successMsg'=>'Data Delete Successfully']);
            }
        }
    }
}
